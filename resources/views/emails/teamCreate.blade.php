<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>You’ve been assigned as Team Leader</title>
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
        <h1>You're now leading a team! 🌟</h1>

        <p>Dear <strong>{{ $team->teamLeader->name }}</strong>,</p>

        <p>We are thrilled to inform you that you have been <strong>officially appointed as the Team Leader</strong> for the <strong>{{ $team->roles->name }}</strong> team.</p>

        <div class="highlight">
            <p><strong>📌 Team Description:</strong><br>
                {{ $team->description }}</p>

            <p><strong>🎯 Assigned Project:</strong><br>
                {{ $team->projects->title ?? 'N/A' }}</p>
        </div>

        <p>This is not just a role—it's a responsibility and an opportunity to inspire, lead, and grow your team toward success. We believe in your abilities and trust you’ll lead with vision and integrity.</p>

        <div class="footer">
            <p>Warm regards,</p>
            <p><strong>Your Team Management System</strong></p>
        </div>
    </div>
</body>
</html>
