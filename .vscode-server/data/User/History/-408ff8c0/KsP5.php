<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yuan Yin (Brandy)</title>
    <style>
        body {
            background-color: #ffebee; /* 浅粉色背景 */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 380px;
            text-align: center;
        }
        h1 {
            color: #d81b60; /* 深粉色标题 */
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: bold;
        }
        .student-id {
            font-size: 18px;
            color: #333;
            margin: 0;
            margin-bottom: 15px;
        }
        .user-name {
            font-size: 20px;
            color: #555;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 10px;
            background-color: #d81b60;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #c2185b; /* 鼠标悬停效果 */
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .nav-links {
            margin: 20px 0;
        }
        .nav-links a {
            text-decoration: none;
            color: #d81b60;
            margin: 0 10px;
            font-weight: bold;
        }
        .nav-links a:hover {
            color: #c2185b;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- 显示导航链接 -->
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        
        <h1>Welcome to my page!</h1>
        
        <!-- 显示用户信息 -->
        @guest
            <p class="student-id">Student ID: <strong>B01734499</strong></p>
            <p>Please login to continue.</p>
            <a href="{{ route('login') }}" class="button">Login</a>
            <a href="{{ route('register') }}" class="button">Register</a>
        @else
            <p class="student-id">Student ID: <strong>B01734499</strong></p>
            <p class="user-name">Hello, {{ Auth::user()->name }}</p>
            <a href="{{ route('dashboard') }}" class="button">Go to Dashboard</a>
        @endguest

        <div class="footer">Welcome to my personal page!</div>
    </div>
</body>
</html>
