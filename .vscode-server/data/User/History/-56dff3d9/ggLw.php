<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers List</title>
</head>
<body>
    <h1>All Flowers</h1>
    
    <!-- 创建新花卉按钮 -->
    <a href="{{ route('flowers.create') }}">Create a new flower</a>

    <!-- 判断是否有花卉数据 -->
    @if($flowers->isEmpty())
        <p>No flowers available. <a href="{{ route('flowers.create') }}">Create your first flower</a></p>
    @else
        <ul>
            @foreach($flowers as $flower)
                <li>
                    {{ $flower->name }} - ${{ $flower->price }}
                    <a href="{{ route('flowers.show', $flower->id) }}">View</a>
                    <a href="{{ route('flowers.edit', $flower->id) }}">Edit</a>

                    <!-- 删除按钮，添加确认机制 -->
                    <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this flower?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
