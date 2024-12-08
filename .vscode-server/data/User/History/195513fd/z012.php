<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Flower</title>
</head>
<body>
    <h1>Edit Flower</h1>

    <form action="{{ route('flowers.update', $flower->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Flower Name</label>
        <input type="text" name="name" id="name" value="{{ $flower->name }}" required>

        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ $flower->price }}" required>

        <label for="description">Description</label>
        <textarea name="description" id="description">{{ $flower->description }}</textarea>

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <button type="submit">Update</button>
    </form>
</body>
</html>
