<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Document Submission System</title>
    <style>
        /* General Reset */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('/assets/images/Background.png') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            width: 350px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .container h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: 600;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 10px 15px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .form-group label {
            position: absolute;
            left: 15px;
            top: -8px;
            background: white;
            font-size: 0.85rem;
            padding: 0 5px;
            color: #555;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: #555;
            margin-top: 10px;
        }

        .options a {
            text-decoration: none;
            color: #007bff;
        }

        .options a:hover {
            text-decoration: underline;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff;
        }

        .icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #ccc;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">Document Submission System</div>
        <h1>Login</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <div style="color: red; margin-bottom: 15px;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="/auth/loginSubmit" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <i class="icon">📧</i>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <i class="icon">🔒</i>
            </div>
            <div class="options">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="/forgot-password">Forgot Password?</a>
            </div>
            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</body>
</html>
