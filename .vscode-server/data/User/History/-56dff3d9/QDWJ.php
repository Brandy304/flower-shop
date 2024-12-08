<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers List</title>
</head>
<body>
    <h1>All Flowers</h1>
    <a href="{{ route('flowers.create') }}">Create a new flower</a>

    <ul>
        @foreach($flowers as $flower)
            <li>
                {{ $flower->name }} - ${{ $flower->price }}
                <a href="{{ route('flowers.show', $flower->id) }}">View</a>
                <a href="{{ route('flowers.edit', $flower->id) }}">Edit</a>
                <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>

