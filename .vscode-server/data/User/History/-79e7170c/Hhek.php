<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- 导入Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- 可选：添加其他自定义样式 -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FEE2E2;
        }

        .container {
            max-width: 7xl;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-header {
            background-color: #D61C4E;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .dashboard-header h2 {
            font-size: 1.75rem;
            font-weight: bold;
        }

        .flower-management {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .flower-management h2 {
            color: #D61C4E;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .flower-management a {
            background-color: #D61C4E;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .flower-management a:hover {
            background-color: #9B1B2D;
        }

        .flower-list .flower-item {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .flower-list .flower-item:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .flower-item h3 {
            color: #8B1F43;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .flower-item p {
            color: #4B5563;
            font-size: 1rem;
        }

        .flower-item .btn {
            padding: 8px 16px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 0.875rem;
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

        .image-placeholder {
            background-color: #F9FAFB;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .image-placeholder img {
            width: 90%;
            max-width: 700px;
            margin: 0 auto;
            display: block;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="flex justify-between items-center dashboard-header">
            <h2 class="font-semibold text-xl text-white leading-tight">Dashboard</h2>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- 外部容器，用于美化 -->
                <div class="bg-pink-50 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-8 text-gray-900 space-y-8">
                        <!-- 图片展示部分 -->
                        <div class="image-placeholder">
                            <img src="{{ asset('images/Dashboardflower.jpg') }}" alt="Dashboard Flower">
                        </div>

                        <!-- 花卉管理模块 -->
                        <div class="flower-management">
                            <h2 class="text-2xl font-extrabold text-pink-600">Flower Management</h2>

                            <!-- 创建新花卉按钮 -->
                            <a href="{{ route('flowers.create') }}" class="inline-block bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-700 transition duration-300">Create New Flower</a>

                            <!-- 花卉列表 -->
                            <div class="flower-list mt-8 space-y-6">
                                @if($flowers->count() > 0)
                                    @foreach($flowers as $flower)
                                        <div class="flower-item bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                                            <h3 class="text-xl font-semibold text-pink-800">{{ $flower->name }}</h3>
                                            <p class="text-gray-600">Price: <span class="text-pink-500">${{ $flower->price }}</span></p>
                                            <p class="text-gray-500">{{ $flower->description }}</p>

                                            <!-- 编辑和删除按钮 -->
                                            <div class="mt-4 flex space-x-4">
                                                <a href="{{ route('flowers.edit', $flower->id) }}" class="btn btn-edit">Edit</a>
                                                <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-gray-600">No flowers available. <a href="{{ route('flowers.create') }}" class="text-pink-500">Create your first flower</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </
