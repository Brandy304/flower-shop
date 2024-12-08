<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FEE2E2;  
        }

        .container {
            max-width: 7xl;
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

        .flower-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .flower-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .flower-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .flower-item img {
            max-width: 100%;
            border-radius: 10px;
        }

        .flower-item h3 {
            font-size: 1.25rem;
            color: #8B1F43;
            font-weight: bold;
        }

        .flower-item p {
            color: #4B5563;
            font-size: 1rem;
            margin-top: 10px;
        }

        .flower-item .btn-edit,
        .flower-item .btn-delete {
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 1rem;
            text-align: center;
        }

        .btn-edit {
            background-color: #FBBF24;
            color: white;
        }

        .btn-edit:hover {
            background-color: #F59E0B;
        }

        .btn-delete {
            background-color: #EF4444;
            color: white;
        }

        .btn-delete:hover {
            background-color: #DC2626;
        }

        .success-message {
            color: green;
            margin-bottom: 10px;
        }

        .btn-back {
            background-color: #6B21A8;  /* 紫色背景 */
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 30px;
        }

        .btn-back:hover {
            background-color: #8B5CF6;  
        }

    </style>
</head>

<body>
    <div class="container">
        <!-- Dashboard Header -->
        <div class="header">
            <h1 class="font-semibold text-xl text-white">Flower List</h1>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Flower List -->
        <div class="flower-list">
            @foreach($flowers as $flower)
                <div class="flower-item">
                    <!-- Flower Image -->
                    @if($flower->image)
                        <img src="{{ asset('storage/' . $flower->image) }}" alt="{{ $flower->name }}">
                    @else
                        <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available">
                    @endif

                    <h3>{{ $flower->name }}</h3>
                    <p>Price: ${{ $flower->price }}</p>
                    <p>{{ $flower->description }}</p>

                    <div class="flex space-x-4">
                        <!-- Edit Button -->
                        <a href="{{ route('flowers.edit', $flower->id) }}" class="btn-edit">Edit</a>

                        <!-- Delete Form -->
                        <form action="{{ route('flowers.destroy', $flower->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Back to Florist Dashboard Button -->
        <a href="{{ route('florist-dashboard') }}" class="btn-back">Back to Florist Dashboard</a>
    </div>
</body>

</html>
