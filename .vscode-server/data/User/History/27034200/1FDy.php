<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- 主框架，增加一些背景和圆角效果 -->
            <div class="bg-pink-100 overflow-hidden shadow-lg sm:rounded-xl p-6">
                <!-- 顶部右上角的登录信息 -->
                <div class="text-right">
                    <p class="text-lg font-medium text-gray-800">You're logged in!</p>
                </div>

                <!-- 花卉管理模块 -->
                <div class="flower-management mt-8">
                    <h2 class="text-2xl font-bold text-pink-600">Flower Management</h2>

                    <!-- 创建新花卉按钮，背景色粉色 -->
                    <a href="{{ route('flowers.create') }}" class="inline-block bg-pink-500 text-white py-2 px-6 rounded-xl hover:bg-pink-600 mt-4 transition duration-300 ease-in-out">
                        Create New Flower
                    </a>

                    <!-- 花卉列表 -->
                    <div class="flower-list mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @if($flowers->count() > 0)
                            @foreach($flowers as $flower)
                                <div class="flower-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
                                    <!-- 图片位置 -->
                                    <div class="flower-image mb-4">
                                        <img src="{{ asset('storage/' . $flower->image) }}" alt="{{ $flower->name }}" class="w-full h-40 object-cover rounded-lg" />
                                    </div>
                                    
                                    <h3 class="text-xl font-semibold text-pink-500">{{ $flower->name }}</h3>
                                    <p class="text-gray-600">Price: ${{ $flower->price }}</p>
                                    <p class="text-gray-500 mt-2">{{ $flower->description }}</p>

                                    <!-- 编辑和删除按钮 -->
                                    <div class="mt-4 flex space-x-4">
                                        <a href="{{ route('flowers.edit', $flower->id) }}" class="bg-yellow-500 text-white py-1 px-4 rounded-lg hover:bg-yellow-600 transition duration-300 ease-in-out">
                                            Edit
                                        </a>
                                        <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-1 px-4 rounded-lg hover:bg-red-600 transition duration-300 ease-in-out">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- 如果没有花卉，显示引导文字 -->
                            <p class="text-gray-600 mt-6">
                                No flowers available. <a href="{{ route('flowers.create') }}" class="text-pink-500 font-semibold hover:underline">Create your first flower</a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

