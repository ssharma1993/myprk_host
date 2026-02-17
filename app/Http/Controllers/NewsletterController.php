<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Throwable;

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
            'email' => 'required|string|email|max:255',
        ]);

        $email = strtolower(trim($data['email']));

        $subscriber = NewsletterSubscriber::where('email', $email)->first();
        $token = Str::uuid()->toString();

        if ($subscriber) {
            $subscriber->update([
                'is_active' => true,
                'unsubscribe_token' => $token,
            ]);
        } else {
            NewsletterSubscriber::create([
                'email' => $email,
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

        if ($subscribers->isEmpty()) {
            return redirect()->route('newsletter.index')
                ->with('warning', 'No active subscribers found.')
                ->with('newsletter_status', [
                    'total' => 0,
                    'sent' => 0,
                    'failed' => 0,
                    'failed_emails' => [],
                ]);
        }

        $sentCount = 0;
        $failedEmails = [];

        foreach ($subscribers as $subscriber) {
            try {
                Mail::send('emails.newsletter', [
                    'content' => $data['content'],
                    'subscriber' => $subscriber,
                ], function ($message) use ($subscriber, $data) {
                    $message->to($subscriber->email)->subject($data['subject']);
                });

                $sentCount++;
            } catch (Throwable $e) {
                $failedEmails[] = $subscriber->email;
            }
        }

        $failedCount = count($failedEmails);
        $totalCount = $subscribers->count();

        if ($failedCount === 0) {
            return redirect()->route('newsletter.index')
                ->with('success', 'Email sent successfully to all ' . $sentCount . ' subscribers.')
                ->with('newsletter_status', [
                    'total' => $totalCount,
                    'sent' => $sentCount,
                    'failed' => 0,
                    'failed_emails' => [],
                ]);
        }

        return redirect()->route('newsletter.index')
            ->with('warning', 'Email sent to ' . $sentCount . ' of ' . $totalCount . ' subscribers. ' . $failedCount . ' failed.')
            ->with('newsletter_status', [
                'total' => $totalCount,
                'sent' => $sentCount,
                'failed' => $failedCount,
                'failed_emails' => $failedEmails,
            ]);
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
