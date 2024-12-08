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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FDE2E3; /* 设置页面背景颜色为浅粉色 */
        }
    </style>
</head>
<body class="bg-pink-50">

    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between items-center bg-pink-600 p-4 rounded-lg shadow-md">
                <h2 class="font-semibold text-xl text-white">
                    {{ __('Dashboard') }}
                </h2>
                <div class="text-right text-white">
                    <p class="text-sm">{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- 外部容器，用于美化 -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- 主要内容区域 -->
                    <div class="p-6 text-gray-900 space-y-6">

                        <!-- 花卉管理模块 -->
                        <div class="flower-management">
                            <h2 class="text-2xl font-extrabold text-pink-600">Flower Management</h2>

                            <!-- 创建新花卉按钮 -->
                            <a href="{{ route('flowers.create') }}" class="inline-block bg-pink-500 text-white py-2 px-4 rounded-lg hover:bg-pink-700 mt-6 transition duration-300">Create New Flower</a>

                            <!-- 花卉列表 -->
                            <div class="flower-list mt-6 space-y-6">
                                @if($flowers->count() > 0)
                                    @foreach($flowers as $flower)
                                        <div class="flower-item bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                                            <h3 clas
