<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                
                <!-- 花卉管理模块 -->
                <div class="flower-management mt-8">
                    <h2 class="text-xl font-bold">Flower Management</h2>
                    
                    <!-- 创建新花卉 -->
                    <a href="{{ route('flowers.create') }}" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 mt-4">Create New Flower</a>

                    <!-- 花卉列表 -->
                    <div class="flower-list mt-6">
                        @if($flowers->count() > 0)
                            @foreach($flowers as $flower)
                                <div class="flower-item bg-gray-100 p-4 mb-4 rounded">
                                    <h3 class="text-lg font-semibold">{{ $flower->name }}</h3>
                                    <p class="text-gray-600">Price: ${{ $flower->price }}</p>
                                    <p class="text-gray-500">{{ $flower->description }}</p>
                                    
                                    <!-- 编辑和删除按钮 -->
                                    <div class="mt-2">
                                        <a href="{{ route('flowers.edit', $flower->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-700">Edit</a>
                                        <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" class="inline ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-700">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-gray-600">No flowers available. <a href="{{ route('flowers.create') }}" class="text-blue-500">Create your first flower</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
