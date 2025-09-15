<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('/assets/images/Background.png') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.8); /* Slightly transparent background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .container h1 {
            margin-bottom: 20px;
        }
        .container button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            transition: background-color 0.3s ease;
        }
        .container button:hover {
            background-color: #45a049;
        }
        .container a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Admin Page</h1>
        <button onclick="addUser()">Add User</button>
        <button onclick="removeUser()">Remove User</button>
        <button onclick="addDocType()">Add Doc Type</button>
        <a href="/auth/logout">Logout</a>
    </div>

    <script>
        function addUser() {
            window.location.href = "/adminPage/addUser"; // Navigates to the Add User page
        }

        function removeUser() {
            window.location.href = "/adminPage/removeUser"; // Navigates to the remove User page
        }
        function addDocType(){
            window.location.href = "/adminPage/addDocType"; // Navigates to the remove User page
        }

        

    </script>
</body>
</html>
