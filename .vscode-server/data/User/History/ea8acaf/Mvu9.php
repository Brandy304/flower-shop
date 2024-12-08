<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Flower</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FEE2E2; /* 浅粉色背景 */
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
            color: #D61C4E;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #D61C4E;
            font-size: 1.125rem; /* 较大的字体，更加醒目 */
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #E2E8F0;
            margin-bottom: 15px;
            box-sizing: border-box;
            font-size: 1rem; /* 字体大小适中 */
        }
        button {
            background-color: #D61C4E;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 1.125rem; /* 按钮文字稍大，提升可点击性 */
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #9B1B2D;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create a New Flower</h1>

        <form action="{{ route('flowers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Flower Name</label>
                <input type="text" name="name" id="name" required placeholder="Enter the flower's name">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" required placeholder="Enter the flower's price">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" placeholder="Enter a description for the flower"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
            </div>

            <div class="form-group">
                <button type="submit">Create Flower</button>
            </div>
        </form>
    </div>
</body>
</html>
