<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Flower Shop</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body class="bg-pink-50">

    
    <div class="container mx-auto p-6">

        
        <div class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-pink-600">Welcome to Your Flower Shop</h1>
            <p class="text-lg text-gray-600 mt-2">Browse and buy the best flowers just for you!</p>
        </div>

        
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-xl font-semibold text-pink-600">Available Flowers</h3>

           
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">

                <!-- 花卉卡片 1 -->
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                   <img src="{{ asset('images/rose.jpg') }}" alt="Rose" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Rose</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $10.5</p>
                    <p class="text-gray-600 mt-4">A rose is a beautiful flower knownfor its soft petals and sweetfragrance. 
                    lt comes in manycolors, such as red, pink, white.and yellow. Roses are often seenas symbols of love and beauty.</p>
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
                   <img src="images/tulip.jpg" alt="Tulip" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Tulip</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $10</p>
                    <p class="text-gray-600 mt-4">Known for its vibrant colors andsmooth, rounded petals,
                     the tulipis a springtime favorite. Comes inshades of yellow, purple, and red</p>
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
                    <img src="images/sunflower.jpg" alt="Sunflower" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Sunflower</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $5</p>
                    <p class="text-gray-600 mt-4">Known for its large, yellow petalsand tall, sturdy stem,
                     thesunflower is a symbol of positivityand energy.
                    Perfect forbrightening up any space.</p>
                    <div class="mt-6 flex justify-between">
                        <button class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                            Buy Now
                        </button>
                        <button class="bg-gray-500 text-white py-2 px-6 rounded-lg hover:bg-gray-600 transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                
                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                   <img src="images/Violet.jpg" alt="Violet" class="w-full h-56 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-pink-600">Violet</h3>
                    <p class="text-lg text-gray-800 mt-2">Price: $12</p>
                    <p class="text-gray-600 mt-4">Violets are known for theircharming purple petals and softfragrance. 
                    They are often used inbouquets and potted plants,symbolizing humility and loyalty.</p>
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
