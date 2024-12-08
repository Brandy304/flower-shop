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
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 320px;
        }
        h1 {
            color:#333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #d81b60;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to my page!</h1>
        @guest
            <a href="{{ route('login') }}" class="button">Login</a>
            <a href="{{ route('register') }}" class="button">Register</a>
        @else
            <p>Hello, {{ Auth::user()->name }}</p>
            <p>Student ID: <strong>B01734499</strong></p>  <!-- 显示学号 -->
            <a href="{{ route('dashboard') }}" class="button">Go to Dashboard</a>
        @endguest
        <div class="footer">Welcome to my page!</div>
    </div>
</body>
</html>
