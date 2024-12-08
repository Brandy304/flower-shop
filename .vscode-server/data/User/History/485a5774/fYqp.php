<form action="{{ route('flowers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="flower_image" class="block text-sm font-medium text-gray-700">Upload Flower Image</label>
        <input type="file" name="flower_image" id="flower_image" class="mt-2 p-2 border rounded-lg" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Submit</button>
</form>
