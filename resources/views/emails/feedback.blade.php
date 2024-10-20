<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Received</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_admin/img/favicon.jpg') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .header {
            background-color: yellowgreen;
            padding: 10px;
            color: white;
            text-align: center;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .section-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            font-size: 0.8em;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Your Feedback!</h1>
        </div>

        <div class="content">
            <p>Dear {{ $feedback->name ?? 'Customer' }},</p>
            <p>Thank you for your valuable feedback. We appreciate you taking the time to share your thoughts with us.</p>
            <p>We Will Look into your issue anad contact u incase of any details required.</p>

            <div class="feedback-details">
                <div class="section-title">Your Feedback </div>
                <p><strong>Name:</strong> {{ $feedback->name ?? 'Not found' }}</p>
                <p><strong>Email:</strong> {{ $feedback->email ?? 'Not found' }}</p>
                <p><strong>Contact No:</strong> {{ $feedback->contact_no ?? 'Not found' }}</p>
                <p><strong>Message:</strong> {{ $feedback->message ?? 'Not found' }}</p>
            </div>
        </div>

        <div class="footer">
            <p>Thank you for reaching out to us!</p>
            <p>&copy; 2024 YourCompany. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
