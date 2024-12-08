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
            background-color: #ffffff; /* 白色容器 */
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 320px;
        }
        h1 {
            color:#333; /* 深粉色标题 */
            margin-bottom: 20px;
            font-size: 24px;
        }
        p {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #d81b60; /* 深粉色按钮 */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #c2185b; /* 鼠标悬停效果 */
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        nav {
            margin-bottom: 20px;
        }
        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #d81b60;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
        <h1>Yuan Yin (Brandy)</h1>
        <p>Student ID: <strong>B01734499</strong></p>
        <a href="{{ url('/flowershop') }}" class="button">Learn More</a>
        <div class="footer">Welcome to my page!</div>
    </div>
</body>
</html>
