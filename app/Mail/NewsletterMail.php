<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $content;
    public NewsletterSubscriber $subscriber;

    protected string $subjectLine;

    /**
     * Create a new message instance.
     */
    public function __construct(string $subjectLine, string $content, NewsletterSubscriber $subscriber)
    {
        $this->subjectLine = $subjectLine;
        $this->content = $content;
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject($this->subjectLine)
            ->view('emails.newsletter')
            ->with([
                'subject' => $this->subjectLine,
                'content' => $this->content,
                'subscriber' => $this->subscriber,
            ]);
    }
}