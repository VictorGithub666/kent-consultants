<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Enquiry</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f5f4f0; margin: 0; padding: 24px; color: #1a1715; }
        .wrapper { max-width: 600px; margin: 0 auto; }
        .header {
            background: linear-gradient(to right, #A67C00, #FFD700, #7F5800);
            padding: 32px 40px;
            border-radius: 12px 12px 0 0;
            text-align: center;
        }
        .header h1 { color: #1a1715; font-size: 22px; margin: 0; font-weight: 700; }
        .header p  { color: #1a1715; opacity: 0.75; margin: 6px 0 0; font-size: 14px; }
        .body {
            background: #ffffff;
            padding: 32px 40px;
            border-left: 1px solid #e5e7eb;
            border-right: 1px solid #e5e7eb;
        }
        .label { font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.6px; color: #6c6a68; margin-bottom: 4px; }
        .value { font-size: 15px; color: #1a1715; margin-bottom: 20px; word-break: break-word; }
        .message-box {
            background: #f7f8fa;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px 20px;
            font-size: 15px;
            line-height: 1.7;
            white-space: pre-line;
            color: #1a1715;
        }
        .divider { border: none; border-top: 1px solid #e5e7eb; margin: 24px 0; }
        .btn {
            display: inline-block;
            background: linear-gradient(to right, #A67C00, #FFD700, #7F5800);
            color: #1a1715;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            margin-top: 8px;
        }
        .footer {
            background: #f7f8fa;
            border: 1px solid #e5e7eb;
            border-top: none;
            border-radius: 0 0 12px 12px;
            padding: 20px 40px;
            text-align: center;
            font-size: 12px;
            color: #6c6a68;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>New Contact Enquiry</h1>
            <p>A visitor has submitted a message via the website contact form</p>
        </div>

        <div class="body">
            <div class="label">From</div>
            <div class="value">{{ $contactMessage->name }}</div>

            <div class="label">Email</div>
            <div class="value"><a href="mailto:{{ $contactMessage->email }}" style="color:#A67C00;">{{ $contactMessage->email }}</a></div>

            @if($contactMessage->phone)
            <div class="label">Phone</div>
            <div class="value">{{ $contactMessage->phone }}</div>
            @endif

            <div class="label">Subject</div>
            <div class="value">{{ $contactMessage->subject }}</div>

            <hr class="divider">

            <div class="label">Message</div>
            <div class="message-box">{{ $contactMessage->message }}</div>

            <hr class="divider">

            <p style="font-size:14px; color:#6c6a68; margin-bottom:12px;">
                View and respond to this enquiry in the admin panel:
            </p>
            <a href="{{ url('/admin/dashboard') }}" class="btn">
                View Admin Panel →
            </a>
        </div>

        <div class="footer">
            <p style="margin:0;">Received {{ $contactMessage->created_at->format('l, F j, Y \a\t g:i A') }}</p>
            <p style="margin:6px 0 0;">&copy; {{ date('Y') }} Kent Consultants Ltd &mdash; This is an automated notification.</p>
        </div>
    </div>
</body>
</html>
