@extends('layouts.app') <!-- 使用你的基础布局 -->

@section('content')

<div class="container mx-auto p-6">

    <!-- 用户仪表盘标题 -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-semibold text-pink-600">Welcome to Your Flower Shop</h1>
        <p class="text-lg text-gray-600 mt-2">Browse and buy the best flowers just for you!</p>
    </div>

    <!-- 花卉展示区域 -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h3 class="text-xl font-semibold text-pink-600">Available Flowers</h3>

        <!-- 花卉卡片网格 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
            @foreach($flowers as $flower)
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <!-- 显示花卉图片 -->
                    @if($flower->image)
                        <img src="{{ asset('storage/' . $flower->image) }}" alt="{{ $flower->name }}" class="w-full h-56 object-cover rounded-lg mb-4">
                    @else
                        <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available" class="w-full h-56 object-cover rounded-lg mb-4">
                    @endif

                    <!-- 显示花卉名称 -->
                    <h3 class="text-xl font-semibold text-pink-600">{{ $flower->name }}</h3>

                    <!-- 显示价格 -->
                    <p class="text-lg text-gray-800 mt-2">Price: ${{ $flower->price }}</p>

                    <!-- 简短的花卉描述 -->
                    <p class="text-gray-600 mt-4">{{ Str::limit($flower->description, 100) }}</p>

                    <!-- 操作按钮 -->
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
