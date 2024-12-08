<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Flower</title>
</head>
<body>
    <h1>Create a New Flower</h1>

    <form action="{{ route('flowers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Flower Name</label>
        <input type="text" name="name" id="name" required>

        <label for="price">Price</label>
        <input type="number" name="price" id="price" required>

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>

        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <button type="submit">Create</button>
    </form>
</body>
</html>
