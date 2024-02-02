<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Update</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
</head>
<body class="bg-gray-100 p-8">
<div class="max-w-2xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="text-2xl font-semibold mb-6">Update Book</h1>
    <form method="POST" action="{{ route('books.update', $book->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Validation Errors -->
        <div>
            @if($errors->any())
                <div class="space-y-1">
                    @foreach($errors->all() as $error)
                        <div class="text-red-500 text-sm">{{ $error }}</div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Form Fields -->
        <div>
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input id="title" name="title" type="text" value="{{ $book->title }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" autofocus>
        </div>

        <div>
            <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author</label>
            <input id="author" name="author" type="text" value="{{ $book->author }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div>
            <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre</label>
            <input id="genre" name="genre" type="text" value="{{ $book->genre }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div>
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <input id="description" name="description" type="text" value="{{ $book->description }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div>
            <label for="publication_year" class="block text-gray-700 text-sm font-bold mb-2">Publication Year</label>
            <input id="publication_year" name="publication_year" type="date" value="{{ $book->publication_year }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div>
            <label for="total_copies" class="block text-gray-700 text-sm font-bold mb-2">Total Copies</label>
            <input id="total_copies" name="total_copies" type="number" value="{{ $book->total_copies }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div>
            <label for="available_copies" class="block text-gray-700 text-sm font-bold mb-2">Available Copies</label>
            <input id="available_copies" name="available_copies" type="number" value="{{ $book->available_copies }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Update
        </button>
    </form>
</div>
</body>
</html>
