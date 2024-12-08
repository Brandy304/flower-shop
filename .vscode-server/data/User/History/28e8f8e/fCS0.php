<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-pink-50">

    <!-- 主要容器 -->
    <div class="container mx-auto p-8">
        <!-- 用户仪表盘标题 -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-pink-600">Welcome to Your Dashboard</h1>
            <p class="text-xl text-gray-700 mt-2">Hi, {{ Auth::user()->name }}! Explore our flowers and manage your profile.</p>
        </div>

        <!-- 用户信息卡片 -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-xl font-semibold text-pink-600">Your Profile</h3>
            <div class="mt-4">
                <p class="text-lg text-gray-800">Name: {{ Auth::user()->name }}</p>
                <p class="text-lg text-gray-800">Email: {{ Auth::user()->email }}</p>
            </div>
        </div>

        <!-- 注销按钮 -->
        <div class="text-right mb-8">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-600 transition duration-300">
                    Logout
                </button>
            </form>
        </div>

        <!-- 花卉展示 -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-xl font-semibold text-pink-600">Available Flowers</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
                <!-- 如果有花卉，显示 -->
                @forelse($flowers as $flower)
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                        <!-- 显示花卉图片 -->
                        @if($flower->image)
                            <img src="{{ asset('storage/' . $flower->image) }}" alt="{{ $flower->name }}" class="w-full h-56 object-cover rounded-lg mb-4">
                        @else
                            <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available" class="w-full h-56 object-cover rounded-lg mb-4">
                        @endif
                        
                        <!-- 显示花卉名称 -->
                        <h4 class="text-lg font-semibold text-pink-600">{{ $flower->name }}</h4>
                        
                        <!-- 显示价格 -->
                        <p class="text-lg text-gray-800 mt-2">Price: ${{ $flower->price }}</p>
                        
                        <!-- 简短描述 -->
                        <p class="text-gray-600 mt-4">{{ Str::limit($flower->description, 100) }}</p>
                    </div>
                @empty
                    <!-- 如果没有花卉，显示以下信息 -->
                    <p class="text-center text-lg text-gray-700">No flowers available at the moment. Check back later!</p>
                @endforelse
            </div>
        </div>
    </div>

</body>

</html>
