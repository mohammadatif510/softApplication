<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Deleted Notification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #f8f9fb;
            padding: 30px;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #e74c3c;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.6;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            text-align: center;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>🗑️ Project Deleted</h2>

        <p>Dear <strong>{{ $team->name }}</strong>,</p>

        <p>We would like to inform you that the project titled <strong>"{{ $project->title }}"</strong> has been <strong>deleted</strong> from the system.</p>

        <p>If you have any concerns or need further details regarding this project, please feel free to contact our support team.</p>

        <p>Thank you for your understanding.</p>

        <div class="footer">
            — Team Management System
        </div>
    </div>
</body>
</html>
