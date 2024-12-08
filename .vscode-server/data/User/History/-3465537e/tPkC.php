<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-6" style="background-color: #f0f4f8;"> <!-- 设置背景颜色为类似 florist-dashboard -->
        <!-- 页面标题 -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-blue-600">Admin Dashboard</h1>
            <p class="text-lg text-gray-700">Welcome, Admin! Here you can manage your dashboard.</p>
        </div>

        <!-- 登出按钮 -->
        <div class="text-right mb-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                    Logout
                </button>
            </form>
        </div>

        <!-- 简单的管理功能占位 -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-xl font-semibold text-blue-600">Admin Actions</h3>
            <div class="mt-4">
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Manage users</li>
                    <li>Manage roles</li>
                    <li>View system stats</li>
                    <li>Customize dashboard</li>
                </ul>
            </div>
        </div>

        <!-- 额外功能区（例如通知） -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-blue-600">Notifications</h3>
            <p class="mt-4 text-gray-700">No new notifications at the moment.</p>
        </div>
    </div>
</body>
</html>
