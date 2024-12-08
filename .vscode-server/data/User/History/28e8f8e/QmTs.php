<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Flower Shop</title>
    <!-- 引入 Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 可以根据需要调整页面的样式 */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="bg-pink-50">

    <!-- 用户仪表盘部分 -->
    <div class="container mx-auto p-6">

        <!-- 欢迎标题 -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-pink-600">Welcome to Your Flower Shop</h1>
            <p class="text-lg text-gray-600 mt-2">Browse and buy the best flowers just for you!</p>
        </div>

        <!-- 花卉展示区域 -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-xl font-semibold text-pink-600">Available Flowers</h3>

            <!-- 花卉卡片网格 -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">

                <!-- 花卉卡片 1 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="https://via.placeholder.com/400x300?text=Flower+1" alt="Flower 1" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Rose</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $15</p>
                    <p class="text-gray-600 mt-4">A beautiful red rose, perfect for any occasion.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- 花卉卡片 2 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="https://via.placeholder.com/400x300?text=Flower+2" alt="Flower 2" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Tulip</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $10</p>
                    <p class="text-gray-600 mt-4">Brighten up your day with this vibrant tulip.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- 花卉卡片 3 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="https://via.placeholder.com/400x300?text=Flower+3" alt="Flower 3" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Lily</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $20</p>
                    <p class="text-gray-600 mt-4">A delicate white lily, the symbol of purity and elegance.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- 花卉卡片 4 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="https://via.placeholder.com/400x300?text=Flower+4" alt="Flower 4" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Daffodil</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $12</p>
                    <p class="text-gray-600 mt-4">A cheerful yellow daffodil to brighten any space.</p>
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
        <div class="text-center mt-6">
            <form method="POST" action="/logout" class="inline-block">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">
                    Log Out
                </button>
            </form>
        </div>

    </div>

</body>
</html>
