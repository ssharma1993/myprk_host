# Contact Form Service Documentation

## Overview

The Contact Form Service handles contact form submissions from the website and sends formatted emails to `info@myprk.ca`.

## Components

### 1. **ContactFormService** (`app/Services/ContactFormService.php`)

- Main service class that handles form submission logic
- Validates and sends emails
- Uses the `ContactFormMail` mailable class
- Logs errors if email sending fails

### 2. **ContactFormMail** (`app/Mail/ContactFormMail.php`)

- Laravel Mailable class that formats the email
- Queued for background processing
- Sends emails with form data to the configured recipient
- Uses the `emails/contact-form.blade.php` template

### 3. **StoreContactRequest** (`app/Http/Requests/StoreContactRequest.php`)

- Form request validation class
- Validates:
    - `name`: Required, string, max 255 characters
    - `email`: Required, valid email format, max 255 characters
    - `message`: Required, string, 10-5000 characters
- Provides custom error messages

### 4. **Contact Form View** (`resources/views/contact.blade.php`)

- Updated form with:
    - CSRF token protection
    - Form POST action to `contact.store` route
    - Error display with Bootstrap alerts
    - Success/Error message display
    - Form field value preservation on validation errors

### 5. **Email Template** (`resources/views/emails/contact-form.blade.php`)

- Professional email template
- Displays client name, email, and message
- Formatted using Laravel's Mailable markdown feature

## Configuration

### Environment Variables (.env)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@myprk.ca"
MAIL_FROM_NAME="PRK Immigration"
```

**Note:** Update these with your actual SMTP credentials.

### Routes (routes/web.php)

```php
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('contact.store');
```

### HomeController Updates

```php
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
```

## Email Recipient

The contact form emails are sent to: **info@myprk.ca**

To change this, update the `CONTACT_EMAIL` constant in `app/Services/ContactFormService.php`:

```php
private const CONTACT_EMAIL = 'your-email@example.com';
```

## How It Works

1. **User submits the contact form** with name, email, and message
2. **Validation** occurs via `StoreContactRequest`
3. **ContactFormService** receives validated data
4. **ContactFormMail** is queued for sending
5. **Email template** is rendered and sent to `info@myprk.ca`
6. **Success/Error message** is displayed to the user

## Features

✅ Form validation with custom error messages
✅ CSRF token protection
✅ Error display on form
✅ Form field value preservation
✅ Success/failure notifications
✅ Email queuing for background processing
✅ Professional email template
✅ Error logging
✅ Bootstrap-styled form and alerts

## Testing the Form

1. Navigate to `/contact`
2. Fill in the form with:
    - Name: Your name
    - Email: Your email
    - Message: Your message (minimum 10 characters)
3. Click "Send"
4. Check your inbox at `info@myprk.ca` for the email

## Queue Configuration

By default, emails are queued. To process them:

```bash
# Process queued jobs synchronously (development)
php artisan queue:work --stop-when-empty

# Or use the database queue driver by updating your .env:
QUEUE_CONNECTION=database
```

## Troubleshooting

### Email Not Sending

- Check `.env` mail configuration
- Verify SMTP credentials are correct
- Check `storage/logs/laravel.log` for errors
- Ensure queue driver is working (if queued)

### Validation Errors

- Check that all form fields are filled
- Message must be at least 10 characters
- Email must be valid format

### Template Issues

- Ensure `resources/views/emails/contact-form.blade.php` exists
- Check for syntax errors in the template
- Verify markdown mailable config in mail.php
