<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            font-size: 1rem;
            margin: 10px 0;
        }
        .btn {
            display: block;
            margin: 20px auto 0;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>My Profile</h1>
        <p><strong>Name:</strong> <?= esc($user['NameWithInitial']) ?></p>
        <p><strong>Contact Number:</strong> <?= esc($user['contact_number']) ?></p>
        <p><strong>Designation:</strong> <?= esc($user['designation']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <a href="/editProfile" class="btn">Edit Profile</a>
        <a href="/dashboard" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>
