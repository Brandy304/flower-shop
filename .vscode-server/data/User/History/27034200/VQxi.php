<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- 导入Tailwind CSS (你可以根据需求替换成其他样式库) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- 可选：添加其他自定义样式 -->
    <style>
        /* 自定义背景和字体样式 */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FEE2E2; /* 浅粉色背景 */
        }

        .container {
            max-width: 7xl;
            margin: 0 auto;
            padding: 20px;
        }

        .image-placeholder {
            background-color: #F9FAFB;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .flower-management {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .flower-management h2 {
            color: #D61C4E; /* 深粉色 */
            font-size: 1.5rem;
            font-weight: bold;
        }

        .flower-management a {
            background-color: #D61C4E;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .flower-management a:hover {
            background-color: #9B1B2D;
        }

        .flower-item {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .flower-item h3 {
            color: #8B1F43; /* 花卉项标题 */
            font-size: 1.25rem;
            font-weight: bold;
        }

        .flower-item p {
            color: #4B5563; /* 默认文本颜色 */
        }

        .flower-item .btn {
            padding: 8px 16px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        .flower-item .btn-edit {
            background-color: #FBBF24;
            color: white;
        }

        .flower-item .btn-edit:hover {
            background-color: #F59E0B;
        }

        .flower-item .btn-delete {
            background-color: #EF4444;
            color: white;
        }

        .flower-item .btn-delete:hover {
            background-color: #DC2626;
        }

        .image-placeholder img {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            display: block;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>

    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
                <div class="text-right text-gray-500">
                    <p class="text-sm">{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </x-slot>

        <div class="py-12 container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- 外部容器，用于美化 -->
                <div class="bg-pink-50 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- 主要内容区域 -->
                    <div class="p-8 text-gray-900 space-y-8">

                        <!-- 图片展示部分 -->
                        <div class="image-placeholder">
                            <img src="{{ asset('images/Dashboard%20flower.jpg') }}" alt="Dashboard Flower">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>

