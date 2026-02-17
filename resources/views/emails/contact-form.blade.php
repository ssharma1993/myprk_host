@component('mail::message')
# New Contact Form Submission

Hello,

You have received a new contact form submission from your website.

## Contact Details

**Name:** {{ $name }}

**Email:** {{ $email }}

**Message:**

{!! nl2br(e($message)) !!}

---

Please reply directly to {{ $email }} to respond to this inquiry.

Thanks,<br>
{{ config('app.name') }} Contact System
@endcomponent