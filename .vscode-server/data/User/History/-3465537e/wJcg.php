<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-6" style="background-color: #ffe4e1;"> <!-- 设置背景颜色为浅粉色 -->
        <!-- 页面标题 -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-pink-600">Admin Dashboard</h1>
            <p class="text-lg text-gray-700">Welcome, Admin! Here you can manage all users and their roles.</p>
        </div>

        <!-- 登出按钮 -->
        <div class="text-right mb-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-pink-500 text-white py-2 px-4 rounded-lg hover:bg-pink-600 transition duration-300">
                    Logout
                </button>
            </form>
        </div>

        <!-- 用户列表 -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-xl font-semibold text-pink-600">Manage Users</h3>
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full table-auto">
                    <thead class="bg-pink-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-600">Name</th>
                            <th class="px-4 py-2 text-left text-gray-600">Email</th>
                            <th class="px-4 py-2 text-left text-gray-600">Role</th>
                            <th class="px-4 py-2 text-center text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-b hover:bg-pink-50">
                                <td class="px-4 py-2 text-gray-800">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-gray-800">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-gray-800">
                                    @foreach($user->roles as $role)
                                        <span class="bg-pink-200 text-pink-600 py-1 px-3 rounded-full text-xs">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-500 text-white py-1 px-4 rounded-lg hover:bg-blue-600 transition duration-300">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-1 px-4 rounded-lg hover:bg-red-600 transition duration-300 ml-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 如果没有任何用户，显示一条消息 -->
        @if($users->isEmpty())
            <p class="mt-8 text-center text-lg text-gray-700">No users found. Add some users to manage.</p>
        @endif
    </div>
</body>
</html>
