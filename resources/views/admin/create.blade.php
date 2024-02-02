<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Create</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="utf-8">
</head>
<body class="bg-gray-100 p-8">
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-semibold mb-6">Create New Book</h1>
    <form method="POST" action="{{ route('books.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('POST')

        <!-- Validation Errors -->
        <div>
            @if ($errors->any())
                <div class="mb-4">
                    @foreach ($errors->all() as $error)
                        <div class="text-red-500 text-sm">{{ $error }}</div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Form Fields -->
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input id="title" name="title" type="text" value="{{ old('title') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" autofocus>
        </div>

        <div class="mb-4">
            <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author</label>
            <input id="author" name="author" type="text" value="{{ old('author') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre</label>
            <input id="genre" name="genre" type="text" value="{{ old('genre') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description"
                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="publication_year" class="block text-gray-700 text-sm font-bold mb-2">Publication Year</label>
            <input id="publication_year" name="publication_year" type="date" value="{{ old('publication_year') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="total_copies" class="block text-gray-700 text-sm font-bold mb-2">Total Copies</label>
            <input id="total_copies" name="total_copies" type="number" value="{{ old('total_copies') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="available_copies" class="block text-gray-700 text-sm font-bold mb-2">Available Copies</label>
            <input id="available_copies" name="available_copies" type="number" value="{{ old('available_copies') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create
            </button>
        </div>
    </form>
</div>
</body>
</html>
