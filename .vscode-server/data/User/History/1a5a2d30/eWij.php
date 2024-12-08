<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Details</title>
</head>
<body>
    <h1>{{ $flower->name }}</h1>
    <p>Price: ${{ $flower->price }}</p>
    <p>{{ $flower->description }}</p>

    @if($flower->image)
        <img src="{{ asset('storage/' . $flower->image) }}" alt="Flower Image" />
    @endif

    <a href="{{ route('flowers.index') }}">Back to list</a>
</body>
</html>
