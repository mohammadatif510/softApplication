<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Updated Credentials</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 40px;
        }

        h1 {
            color: #2c3e50;
        }

        .highlight {
            background-color: #f0f4ff;
            padding: 15px 20px;
            border-left: 4px solid #007bff;
            margin: 20px 0;
            border-radius: 6px;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #888;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 25px;
        }

        .credentials label {
            display: block;
            margin: 8px 0;
            font-size: 15px;
        }

        .credentials strong {
            display: inline-block;
            width: 80px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Credentials Successfully Updated 🔐</h1>

        <p>Dear <strong>{{ $user->name }}</strong>,</p>

        <p>As per your request, we have successfully updated your login credentials. You can now access your account using the new details below.</p>

        <div class="highlight">
            <p><strong>📌 Note:</strong> This action was taken in response to your lost password request. If you did not make this request, please contact our support team immediately.</p>
        </div>

        <div class="credentials">
            <label><strong>Email:</strong> {{ $user->email }}</label>
            <label><strong>Password:</strong> {{ $password }}</label>
        </div>

        <a href="{{ route('login') }}" class="" target="_blank">Login Now</a>

        <div class="footer">
            © {{ date('Y') }} Soft Application. All rights reserved.<br />
            support@softapplication.com
        </div>
    </div>
</body>

</html>