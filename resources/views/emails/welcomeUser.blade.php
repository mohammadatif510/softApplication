<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome Email</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .header {
            background-color: #0d6efd;
            padding: 30px;
            text-align: center;
            color: white;
        }

        .content {
            padding: 30px;
        }

        .content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 24px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .footer {
            background-color: #f1f1f1;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Welcome to Soft Application</h2>
        </div>
        <div class="content">
            <h1>Hello {{ $user->name }},</h1>
            <p>
                We’re thrilled to have you on board! Thank you for joining Soft Application. We’re committed to
                helping you get the most out of our services and achieve your goals.
            </p>
            <p>
                To get started, click the button below and explore your dashboard. If you need any help, feel free to
                reach out to our support team.
            </p>

            <hr>
            <h2>Your Login Cardentials</h2>
            <label for="">
                <strong>Email: </strong> {{ $user->email }}
            </label><br>

            <label for="">
                <strong>Password: </strong> {{ $plainPassword }}
            </label>
        </div>
        <div class="footer">
            © [Year] Soft Application. All rights reserved.<br />
            [Your Address or Contact Info]
        </div>
    </div>
</body>

</html>