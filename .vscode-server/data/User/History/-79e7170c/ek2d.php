<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flower Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FEE2E2;  /* 浅粉色背景 */
        }

        .container {
            max-width: 7xl;
            margin: 0 auto;
            padding: 20px;
        }

        .dashboard-header {
            background-color: #D61C4E;  /* 主色调 */
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 2rem;
            font-weight: bold;
        }

        .header-right {
            text-align: right;
        }

        .header-right p {
            font-size: 1.125rem;
            font-weight: 600;
        }

        .flower-management {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .flower-management h2 {
            color: #D61C4E;
            font-size: 1.75rem;
            font-weight: bold;
        }

        .flower-management a {
            background-color: #D61C4E;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 15px;
        }

        .flower-management a:hover {
            background-color: #9B1B2D;
        }

        .flower-list .flower-item {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .flower-list .flower-item:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .flower-item h3 {
            color: #8B1F43;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .flower-item p {
            color: #4B5563;
            font-size: 1rem;
        }

        .flower-item .btn {
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 1rem;
        }

        .flower-item .btn-edit {
            background-color: #FBBF24;
            color: white;
        }

        .flower-item .btn-edit:hover {
            background-color: #F59E0B;
        }

        .flower-item .btn-delete {
            background-color: #EF4444;
            color: white;
        }

        .flower-item .btn-delete:hover {
            background-color: #DC2626;
        }

        .image-placeholder {
            background-color: #F9FAFB;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .image-placeholder img {
            width: 90%;
            max-width: 700px;
            margin: 0 auto;
            display: block;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body>
    <div class="container">
        <!-- Dashboard Header -->
        <div class="flex justify-between items-center dashboard-header">
            <h1 class="font-semibold text-white">Florist Dashboard</h1>
            <div class="header-right">
                <p class="text-white">You are logged in!</p>
                <p class="text-white font-bold">Yuan Yin (Brandy)</p>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-pink-50 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-8 text-gray-900 space-y-8">

                        <!-- Dashboard Image -->
                        <div class="image-placeholder">
                            <img src="{{ asset('images/Dashboardflower.jpg') }}" alt="Dashboard Flower">
                        </div>

                        <!-- Flower Management Section -->
                        <div class="flower-management">
                            <h2 class="text-2xl font-extrabold text-pink-600">Flower Management</h2>

                            <!-- Create New Flower Button -->
                            <a href="{{ route('flowers.create') }}" class="inline-block bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-700 transition duration-300">Create New Flower</a>

                            <!-- Flower List Button -->
                            <a href="{{ route('flowers.index') }}" class="inline-block bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-700 transition duration-300 mt-4">Flower List</a>

                            <!-- Logout Button -->
                            <form action="{{ route('logout') }}" method="POST" class="inline-block mt-4">
                                @csrf
                                <button type="submit" class="inline-block bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-700 transition duration-300">Logout</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>