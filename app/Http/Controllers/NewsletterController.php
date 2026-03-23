<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;

class NewsletterController extends Controller
{
    public function index()
    {
        $subscribers = NewsletterSubscriber::orderBy('created_at', 'desc')->get();

        $stats = [
            'total' => $subscribers->count(),
            'active' => $subscribers->where('is_active', true)->count(),
            'inactive' => $subscribers->where('is_active', false)->count(),
        ];

        return Inertia::render('Newsletter/Index', compact('subscribers', 'stats'));
    }

    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:rfc,dns|max:255',
        ]);

        $subscriber = NewsletterSubscriber::where('email', $data['email'])->first();
        $token = Str::uuid()->toString();

        if ($subscriber) {
            $subscriber->update([
                'is_active' => true,
                'unsubscribe_token' => $token,
            ]);
        } else {
            NewsletterSubscriber::create([
                'email' => $data['email'],
                'unsubscribe_token' => $token,
                'is_active' => true,
            ]);
        }

        return redirect()->back()->with('success', 'Thanks for subscribing!');
    }

    public function unsubscribe(string $token)
    {
        $subscriber = NewsletterSubscriber::where('unsubscribe_token', $token)->first();

        if ($subscriber) {
            $subscriber->update(['is_active' => false]);
        }

        return redirect()->route('home')
            ->with('success', 'You have been unsubscribed.');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $subscribers = NewsletterSubscriber::where('is_active', true)->get();

        foreach ($subscribers as $subscriber) {
            Mail::send('emails.newsletter', [
                'content' => $data['content'],
                'subscriber' => $subscriber,
            ], function ($message) use ($subscriber, $data) {
                $message->to($subscriber->email)->subject($data['subject']);
            });
        }

        return redirect()->route('newsletter.index')
            ->with('success', 'Email sent to ' . $subscribers->count() . ' subscribers.');
    }

    public function preview(Request $request)
    {
        $data = $request->validate([
            'subject' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);

        $subject = $data['subject'] ?? 'Newsletter Preview';
        $content = $data['content'] ?? "This is a preview of your newsletter message.";

        $subscriber = new NewsletterSubscriber([
            'email' => 'preview@example.com',
            'unsubscribe_token' => 'preview',
            'is_active' => true,
        ]);

        return view('emails.newsletter', compact('content', 'subscriber', 'subject'));
    }

    public function destroy(NewsletterSubscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('newsletter.index')
            ->with('success', 'Subscriber deleted.');
    }
}
