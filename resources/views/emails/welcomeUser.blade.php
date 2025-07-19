<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to Soft Application</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 40px;
        }

        h1 {
            color: #2c3e50;
        }

        .highlight {
            background-color: #f0f4ff;
            padding: 15px;
            border-left: 4px solid #007bff;
            margin: 20px 0;
            border-radius: 4px;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #888;
            text-align: center;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome aboard! 🎉</h1>

        <p>Dear <strong>{{ $user->name }}</strong>,</p>

        <p>We are absolutely delighted to welcome you to <strong>Soft Application</strong>! 🎉</p>

        <p>Your account has been successfully created and you’re now part of a platform built to help you grow, connect, and succeed.</p>

        <div class="highlight">
            <p><strong>🧾 Your Login Credentials:</strong></p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Password:</strong> {{ $plainPassword }}</p>
        </div>

        <p>We're excited to support you on this journey. If you ever need help, our support team is just a message away.</p>

        <a href="{{ route('login') }}" class="" target="_blank">Login to Your Account</a>

        <div class="footer">
            <p>With warm regards,</p>
            <p><strong>Team Soft Application</strong></p>
            <p>© {{ date('Y') }} Soft Application. All rights reserved.</p>
        </div>
    </div>
</body>
</html>