<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin books dashboard</title>
</head>
<meta charset="utf-8">
<body>
<h1>Admin dashboard</h1>
<a href="{{route("books.create")}}">Create</a>
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Description</th>
        <th>Total Copies</th>
        <th>Available Copies</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->genre }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->total_copies }}</td>
            <td>{{ $book->available_copies }}</td>
            <td>{{ $book->created_at }}</td>
            <td>{{ $book->updated_at }}</td>
            <td>
                <a href="{{route("books.update",$book->id)}}">Edit</a>
                <form method="POST" action="{{route("books.destroy",$book->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
