<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Flower</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FEE2E2;  /* 浅粉色背景 */
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #D61C4E;  /* 主色调 */
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: bold;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #4B5563;
        }

        .form-container input,
        .form-container textarea,
        .form-container button {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        .form-container button {
            background-color: #F59E0B;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #FBBF24;
        }

        .form-container input[type="file"] {
            padding: 5px;
        }

        .form-container textarea {
            resize: vertical;
            height: 150px;
        }

        .error-message {
            color: red;
            margin-top: -10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Dashboard Header -->
        <div class="header">
            <h1>Edit Flower</h1>
        </div>

        <!-- Edit Form -->
        <div class="form-container">
            <form action="{{ route('flowers.update', $flower->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="name">Flower Name</label>
                <input type="text" name="name" id="name" value="{{ $flower->name }}" required>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ $flower->price }}" required>

                <label for="description">Description</label>
                <textarea name="description" id="description" required>{{ $flower->description }}</textarea>

                <label for="image">Image (Optional)</label>
                <input type="file" name="image" id="image">

                <button type="submit">Update Flower</button>
            </form>
        </div>
    </div>
</body>

</html>

