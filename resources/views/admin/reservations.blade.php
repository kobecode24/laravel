<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reservation Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8">
    <h1 class="text-xl font-semibold text-gray-800 mb-4">Admin Dashboard</h1>
    <a href="{{route("reservations.create")}}" class="mb-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Create</a>
    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative" style="max-height: 405px;">
        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
            <thead>
            <tr class="text-left">
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Id</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Book</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">User</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Reservation Date</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Return Date</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td class="py-2 px-3">{{ $reservation->id }}</td>
                    <td class="py-2 px-3">{{ $reservation->book->title }}</td>
                    <td class="py-2 px-3">{{ $reservation->user->name }}</td>
                    <td class="py-2 px-3">{{ $reservation->reservation_date }}</td>
                    <td class="py-2 px-3">{{ $reservation->return_date }}</td>
                    <td class="py-2 px-3">
                        <a href="{{route("reservations.edit",$reservation->id)}}" class="text-blue-500 hover:text-blue-600">Edit</a>
                        <form method="POST" action="{{route("reservations.destroy",$reservation->id)}}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
