<!DOCTYPE html>
<html>

<head>
    <title>New Contact Form Submission</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #ff90bc;">New Contact Form Submission</h2>

        <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3>Contact Details:</h3>
            <p><strong>Name:</strong> {{ $formData['name'] }}</p>
            <p><strong>Email:</strong> {{ $formData['email'] }}</p>
            <p><strong>Type of Event:</strong> {{ $formData['event'] }}</p>
            <p><strong>Date of Event:</strong> {{ $formData['event-date'] }}</p>
            <p><strong>Number of Guests:</strong> {{ $formData['guests'] }}</p>
            <p><strong>Location:</strong> {{ $formData['location'] }}</p>
        </div>

        <div style="background: #f0f8ff; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <h3>Message:</h3>
            <p>{{ $formData['message'] }}</p>
        </div>

        <p style="font-size: 12px; color: #666;">
            This email was sent from the Hart + Co contact form.
        </p>
    </div>
</body>

</html>
