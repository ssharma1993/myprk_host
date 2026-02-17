<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Gallery;
use App\Models\Sponsor;
use App\Services\ContactFormService;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HomeController extends Controller
{
    protected $services;

    public function __construct()
    {
        $this->services = Service::orderBy('display_order', 'asc')->get();
        view()->share('services', $this->services);
    }

    /**
     * Show the application dashboard or home page.
     */
    public function index()
    {
        // return Inertia::render('home');
        $galleries = Gallery::orderBy('display_order', 'asc')->get();
        $sponsors = Sponsor::orderBy('display_order', 'asc')->get();
        $this->incrementVisitorCount();

        return view('home', compact('galleries', 'sponsors'));
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
        $service = new ContactFormService();

        if ($service->handleSubmission($request->validated())) {
            return redirect()->route('contact')
                ->with('success', 'Thank you for your message! We will get back to you soon.');
        }

        return redirect()->route('contact')
            ->with('error', 'There was an error sending your message. Please try again.');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    public function testimonials()
    {
        return view('testimonials');
    }

    public function resources()
    {
        return view('resources');
    }

    public function gallery()
    {
        $galleries = Gallery::orderBy('display_order', 'asc')->get();
        return view('gallery.index', compact('galleries'));
    }

    public function service($id)
    {
        $service = Service::where('id', $id)->first();
        return view('service', compact('service'));
    }
}
