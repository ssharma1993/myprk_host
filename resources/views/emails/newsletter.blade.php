<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $subject ?? 'Newsletter' }}</title>
</head>

<body style="font-family: Arial, sans-serif; color: #1f2937; line-height: 1.6;">
    <div style="max-width: 640px; margin: 0 auto; padding: 24px;">
        <div style="margin-bottom: 24px;">
            {!! nl2br(e($content)) !!}
        </div>
        <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 24px 0;">
        <p style="font-size: 12px; color: #6b7280;">
            If you no longer want to receive these emails, you can
            <a href="{{ route('newsletter.unsubscribe', $subscriber->unsubscribe_token) }}" style="color: #2563eb;">unsubscribe</a>.
        </p>
    </div>
</body>

</html>