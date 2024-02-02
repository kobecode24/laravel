<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin books dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<meta charset="utf-8">
<body class="bg-gray-100">
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">Books Dashboard</h2>
        </div>
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="block relative">
                <a class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg" href="{{route("books.create")}}">Create New Book</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Title</th>
                        <!-- ... other headers -->
                        <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($books as $book)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    {{ $book->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    {{ $book->title }}
                                </div>
                            </td>
                            <!-- ... other columns -->
                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                <a href="{{route("books.update",$book->id)}}" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Edit</a>
                                <form method="POST" action="{{route("books.destroy",$book->id)}}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
