<<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- 引入Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- 可选：添加自定义样式 -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body class="bg-pink-50">
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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- 外部容器，用于美化 -->
                <div class="bg-pink-50 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- 主要内容区域 -->
                    <div class="p-8 text-gray-900 space-y-8">
                        <!-- 1. 花卉管理模块 -->
                        <div class="flower-management text-center">
                            <h2 class="text-4xl font-extrabold text-pink-600">Flower Management</h2>
                            <p class="text-lg text-gray-600 mt-2">Manage your flowers easily and efficiently</p>

                            <!-- 创建新花卉按钮 -->
                            <a href="{{ route('flowers.create') }}" class="inline-block bg-pink-500 text-white py-3 px-8 rounded-lg hover:bg-pink-700 mt-6 transition duration-300">Create New Flower</a>
                        </div>

                        <!-- 2. Dashboard 内容模块（展示一些统计信息） -->
                        <div class="dashboard-stats grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                            <!-- 统计卡片 1 -->
                            <div class="stat-card bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                                <h3 class="text-2xl font-bold text-pink-600">Total Flowers</h3>
                                <p class="text-gray-500 text-3xl mt-2">{{ $flowers->count() }}</p>
                            </div>

                            <!-- 统计卡片 2 -->
                            <div class="stat-card bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                                <h3 class="text-2xl font-bold text-pink-600">Total Sales</h3>
                                <p class="text-gray-500 text-3xl mt-2">$ {{ $totalSales }}</p>
                            </div>

                            <!-- 统计卡片 3 -->
                            <div class="stat-card bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                                <h3 class="text-2xl font-bold text-pink-600">Active Users</h3>
                                <p class="text-gray-500 text-3xl mt-2">{{ $activeUsers }}</p>
                            </div>
                        </div>

                        <!-- 3. 花卉列表展示 -->
                        <div class="flower-list mt-10 space-y-6">
                            @if($flowers->count() > 0)
                                @foreach($flowers as $flower)
                                    <div class="flower-item bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                                        <h3 class="text-xl font-semibold text-pink-800">{{ $flower->name }}</h3>
                                        <p class="text-gray-600">Price: <span class="text-pink-500">${{ $flower->price }}</span></p>
                                        <p class="text-gray-500">{{ $flower->description }}</p>

                                        <!-- 编辑和删除按钮 -->
                                        <div class="mt-4 flex space-x-4">
                                            <a href="{{ route('flowers.edit', $flower->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-700 transition duration-200">Edit</a>
                                            
                                            <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition duration-200">Delete</button>
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
    </x-app-layout>
</body>
</html>
