<?php

namespace App\Services;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormService
{
    /**
     * Handle contact form submission and send email
     *
     * @param array $data
     * @return bool
     */
    public function handleSubmission(array $data): bool
    {
        try {
            // Send email to contact email address
            Mail::to(config('company.email'))
                ->send(new ContactFormMail($data));

            return true;
        } catch (\Exception $e) {
            \Log::error('Contact form email error: ' . $e->getMessage());
            return false;
        }
    }
}
