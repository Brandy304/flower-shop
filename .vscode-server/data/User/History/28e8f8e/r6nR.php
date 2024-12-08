<x-app-layout>
    <div class="container mx-auto p-6" style="background-color: #ffe4e1;"> <!-- 设置背景颜色为浅粉色 -->
        <!-- 用户仪表盘标题 -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-pink-600">Welcome to Your Flower Shop</h1>
            <p class="text-lg text-gray-700">Browse and buy the best flowers just for you!</p>
        </div>

        <!-- 用户登出按钮 -->
        <div class="text-right mb-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-pink-500 text-white py-2 px-4 rounded-lg hover:bg-pink-600 transition duration-300">
                    Logout
                </button>
            </form>
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

        <!-- 如果没有花卉信息 -->
        @if($flowers->isEmpty())
            <p class="mt-8 text-center text-lg text-gray-700">No flowers available at the moment. Check back later!</p>
        @endif

        <!-- 快捷操作 -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-xl font-semibold text-pink-600">Quick Actions</h3>
            <ul class="mt-4 text-gray-700">
                <li class="mb-4">
                    <a href="#" class="text-pink-500 hover:text-pink-600">Manage Your Account</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="text-pink-500 hover:text-pink-600">Browse Available Products</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="text-pink-500 hover:text-pink-600">Contact Support</a>
                </li>
            </ul>
        </div>

        <!-- 最近活动 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-pink-600">Recent Activities</h3>
            <p class="text-gray-700 mt-4">You haven't performed any activities yet. Start exploring your dashboard!</p>
        </div>

    </div>
</x-app-layout>
