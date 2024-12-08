<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Flower Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- 用户仪表盘 -->
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
                <!-- 花卉卡片 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <!-- 显示花卉图片 -->
                    <img src="path/to/your/flower/image.jpg" alt="Flower Name" class="w-full h-56 object-cover rounded-lg mb-4">

                    <!-- 显示花卉名称 -->
                    <h3 class="text-xl font-semibold text-pink-600">Flower Name</h3>

                    <!-- 显示价格 -->
                    <p class="text-lg text-gray-800 mt-2">Price: $10.00</p>

                    <!-- 简短的花卉描述 -->
                    <p class="text-gray-600 mt-4">This is a beautiful flower description that can be detailed and long.</p>

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
                <!-- 你可以继续为每个花卉重复上面的花卉卡片 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <img src="path/to/your/flower/image2.jpg" alt="Another Flower" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Another Flower</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $12.00</p>
                    <p class="text-gray-600 mt-4">This is another flower description that can be more detailed.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
                <!-- 继续添加其他花卉卡片 -->
            </div>
        </div>

    </div>

</body>
</html>
