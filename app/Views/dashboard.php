<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('/assets/images/Background.png') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
        }

        .navbar h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle {
            background: none;
            border: none;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            min-width: 150px;
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            font-size: 1rem;
        }

        .dropdown-menu a:hover {
            background-color: #f3f4f6;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <h1>Dashboard</h1>
        <div class="dropdown">
            <button class="dropdown-toggle">
                <?= session()->get('user_email') ?>
            </button>
            <div class="dropdown-menu">
                <a href="/profile">My Profile</a>
                <a href="/support">Support</a>
                <a href="/auth/logout">Logout</a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <a href="/documents" class="btn">Documents</a>
        <a href="/documents/submit" class="btn">Submit Documents</a>
        <a href="/documents/status" class="btn">Check Status</a>
    </div>
</body>
</html>
