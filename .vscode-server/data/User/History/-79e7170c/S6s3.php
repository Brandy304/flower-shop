<!-- resources/views/florist-dashboard.blade.php -->
<x-app-layout title="Florist Dashboard">
    <div class="container mx-auto p-6">
        <!-- 图片展示部分 -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-pink-600">Welcome to Your Dashboard</h2>

            <!-- 图片展示 -->
            <div class="mt-6">
                <img src="{{ asset('images/Dashboardflower.jpg') }}" alt="Dashboard Flower" class="max-w-full rounded-lg shadow-md">
            </div>

            <!-- 花卉管理模块 -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-pink-600">Flower Management</h2>

                <!-- 创建新花卉按钮 -->
                <a href="{{ route('flowers.create') }}" class="inline-block bg-pink-500 text-white py-2 px-6 rounded-lg hover:bg-pink-700 transition duration-300 mt-4">Create New Flower</a>

                <!-- 花卉列表 -->
                <div class="flower-list mt-8 space-y-6">
                    @if($flowers->count() > 0)
                        @foreach($flowers as $flower)
                            <div class="flower-item bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                                <h3 class="text-xl font-semibold text-pink-800">{{ $flower->name }}</h3>
                                <p class="text-gray-600">Price: <span class="text-pink-500">${{ $flower->price }}</span></p>
                                <p class="text-gray-500">{{ $flower->description }}</p>

                                <!-- 编辑和删除按钮 -->
                                <div class="mt-4 flex space-x-4">
                                    <a href="{{ route('flowers.edit', $flower->id) }}" class="btn btn-edit">Edit</a>
                                    <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-600">No flowers available. <a href="{{ route('flowers.create') }}" class="text-pink-500">Create your first flower</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
