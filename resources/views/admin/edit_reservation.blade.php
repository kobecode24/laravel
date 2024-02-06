<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Reservation</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<meta charset="utf-8">
<body class="bg-gray-100">
<div class="max-w-2xl mx-auto my-10 p-5 bg-white shadow-md rounded">
    <h1 class="text-xl font-bold mb-5">Edit Reservation</h1>
    <form method="POST" action="{{ route('reservations.update', $reservation->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        @if($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div>
            <label for="book_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Book</label>
            <select id="book_id" name="book_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($books as $book)
                    <option value="{{ $book->id }}" @if($book->id == $reservation->book_id) selected @endif>{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">User</label>
            <select id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id == $reservation->user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">From</label>
            <input id="from" name="reservation_date" type="date" value="{{ old('reservation_date', $reservation->reservation_date->toDateString()) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div>
            <label for="to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">To</label>
            <input id="to" name="return_date" type="date" value="{{ old('return_date', $reservation->return_date->toDateString()) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
    </form>
</div>
</body>
</html>
