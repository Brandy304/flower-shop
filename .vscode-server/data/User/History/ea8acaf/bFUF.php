<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Flower</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FEE2E2;  /* 浅粉色背景 */
        }

        .container {
            max-width: 7xl;
            margin: 0 auto;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #D61C4E;  /* 主色调 */
        }

        .form-container label {
            font-weight: bold;
            color: #333;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .form-container button {
            padding: 12px 24px;
            background-color: #D61C4E;
            color: white;
            border-radius: 10px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #9B1B2D;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        .success-message {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Create a New Flower</h1>

            <!-- 显示成功消息 -->
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <!-- 显示表单验证错误 -->
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('flowers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="name">Flower Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" required>

                <label for="description">Description</label>
                <textarea name="description" id="description">{{ old('description') }}</textarea>

                <label for="image">Image</label>
                <input type="file" name="image" id="image">

                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</body>

</html>

