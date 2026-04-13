<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Gallery;
use App\Models\NewsletterSubscriber;
use App\Models\Service;
use App\Models\Sponsor;
use App\Providers\HomeTestimonialsProvider;
use App\Services\ContactFormService;
use App\Services\CacheService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class HomeController extends Controller
{
    protected $services;
    protected $featuredServices;
    protected $homeTestimonialsProvider;

    public function __construct(HomeTestimonialsProvider $homeTestimonialsProvider)
    {
        $this->homeTestimonialsProvider = $homeTestimonialsProvider;
        // Use caching for services to reduce database hits
        $this->services = CacheService::getServices();
        $this->featuredServices = CacheService::getFeaturedServices();
        view()->share('services', $this->services);
        view()->share('featuredServices', $this->featuredServices);
    }

    /**
     * Show the application dashboard or home page.
     */
    public function index()
    {
        // return Inertia::render('home');
        // Use caching for frequently accessed data
        $galleries = CacheService::getGalleries();
        $sponsors = CacheService::getSponsors();
        $homeTestimonials = $this->homeTestimonialsProvider->all();
        $this->incrementVisitorCount();

        return view('home', compact('galleries', 'sponsors', 'homeTestimonials'));
    }

    public function getVisitorCount(): int
    {
        $path = 'metrics/visitor-count.txt';

        if (!Storage::exists($path)) {
            return 0;
        }

        return (int) trim(Storage::get($path));
    }

    private function incrementVisitorCount(): int
    {
        if (session()->has('visited_home')) {
            return $this->getVisitorCount();
        }

        $path = 'metrics/visitor-count.txt';

        if (!Storage::exists($path)) {
            Storage::put($path, '0');
        }

        $fullPath = Storage::path($path);
        $handle = @fopen($fullPath, 'c+');

        if (!$handle) {
            return 0;
        }

        $count = 0;

        if (flock($handle, LOCK_EX)) {
            $contents = stream_get_contents($handle);
            $count = (int) trim($contents);
            $count++;

            ftruncate($handle, 0);
            rewind($handle);
            fwrite($handle, (string) $count);
            fflush($handle);
            flock($handle, LOCK_UN);
        }

        fclose($handle);

        session(['visited_home' => true]);

        return $count;
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function storeContact(StoreContactRequest $request)
    {
        $validated = $request->validated();

        $subscriber = NewsletterSubscriber::firstOrNew([
            'email' => $validated['email'],
        ]);

        $subscriber->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'unsubscribe_token' => $subscriber->unsubscribe_token ?: Str::uuid()->toString(),
            'is_active' => true,
        ]);

        $subscriber->save();

        $service = new ContactFormService();

        if ($service->handleSubmission($validated)) {
            return redirect()->back()
                ->with('success', 'Thank you for your message! We will get back to you soon.');
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'There was an error sending your message. Please try again.');
    }

    public function testimonials()
    {
        $homeTestimonials = $this->homeTestimonialsProvider->all();

        return view('testimonials', compact('homeTestimonials'));
    }

    public function gallery()
    {
        // Use cached galleries
        $galleries = CacheService::getGalleries();
        return view('gallery.index', compact('galleries'));
    }

    public function service($slug)
    {
        $service = Service::with('children')->where('slug', $slug)->firstOrFail();

        $childServices = collect();

        if (is_null($service->parent_id)) {
            $childServices = $service->children()
                ->orderBy('display_order', 'asc')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('service', compact('service', 'childServices'));
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function termsAndConditions()
    {
        return view('terms-and-conditions');
    }
}
