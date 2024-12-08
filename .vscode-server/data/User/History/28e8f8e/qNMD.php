@extends('layouts.app') <!-- 引入你的基础布局 -->

@section('content')

<!-- 背景颜色和容器 -->
<div class="bg-pink-50 min-h-screen py-8">

    <div class="container mx-auto p-6">

        <!-- 用户仪表盘标题 -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-semibold text-pink-700">Welcome to Your Flower Shop</h1>
            <p class="text-lg text-gray-600 mt-2">Browse and buy the best flowers just for you!</p>
        </div>

        <!-- 花卉展示区域 -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-2xl font-semibold text-pink-600 mb-4">Available Flowers</h3>

            <!-- 花卉卡片网格 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                <!-- 第一花卉 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="{{ asset('images/flower1.jpg') }}" alt="Flower 1" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Rose</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $25.00</p>
                    <p class="text-gray-600 mt-4">A beautiful red rose to express your love.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- 第二花卉 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="{{ asset('images/flower2.jpg') }}" alt="Flower 2" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Tulip</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $30.00</p>
                    <p class="text-gray-600 mt-4">A vibrant tulip to brighten up your day.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- 第三花卉 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="{{ asset('images/flower3.jpg') }}" alt="Flower 3" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Lily</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $28.00</p>
                    <p class="text-gray-600 mt-4">An elegant lily that suits any occasion.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- 第四花卉 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="{{ asset('images/flower4.jpg') }}" alt="Flower 4" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Sunflower</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $22.00</p>
                    <p class="text-gray-600 mt-4">A cheerful sunflower to make your space more lively.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Log Out 按钮 -->
        <div class="text-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">
                    Log Out
                </button>
            </form>
        </div>

    </div>

</div>

@endsection
