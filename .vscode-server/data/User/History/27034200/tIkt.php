<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-pink-50 flex justify-center items-center min-h-screen">
        <div class="container bg-white rounded-lg shadow-lg p-8 w-full max-w-lg">
            <!-- 导航栏 -->
            <nav class="mb-6">
                <a href="#" class="text-pink-600 mr-4 hover:text-pink-800">Home</a>
                <a href="#" class="text-pink-600 mr-4 hover:text-pink-800">About</a>
                <a href="#" class="text-pink-600 hover:text-pink-800">Contact</a>
            </nav>
            
            <!-- 欢迎信息 -->
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">Welcome to your Dashboard</h1>
            <p class="text-xl text-gray-700 mb-6">You are logged in as <strong>{{ Auth::user()->name }}</strong></p>

            <!-- 花卉管理模块 -->
            <div class="flower-management mt-8 mb-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Flower Management</h2>
                
                <!-- 创建新花卉按钮 -->
                <a href="{{ route('flowers.create') }}" class="inline-block bg-pink-500 text-white py-2 px-6 rounded-full hover:bg-pink-700 transition-colors mb-6">Create New Flower</a>

                <!-- 花卉列表 -->
                <div class="flower-list mt-6">
                    @if($flowers->count() > 0)
                        @foreach($flowers as $flower)
                            <div class="flower-item bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $flower->name }}</h3>
                                <p class="text-gray-600">Price: ${{ $flower->price }}</p>
                                <p class="text-gray-500">{{ $flower->description }}</p>
                                 
                                <!-- 编辑和删除按钮 -->
                                <div class="mt-2 flex space-x-2">
                                    <a href="{{ route('flowers.edit', $flower->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-700 transition-colors">Edit</a>
                                    <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" class="inline ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700 transition-colors">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-600">No flowers available. <a href="{{ route('flowers.create') }}" class="text-pink-500 hover:text-pink-700">Create your first flower</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
