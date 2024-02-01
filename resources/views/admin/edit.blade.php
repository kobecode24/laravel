<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Create</title>
</head>
<meta charset="utf-8">
<body>
<h1>Admin Update</h1>
<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')

    <div>
        @if(
            $errors->has('title') ||
            $errors->has('author') ||
            $errors->has('genre') ||
            $errors->has('description') ||
            $errors->has('publication_year') ||
            $errors->has('total_copies') ||
            $errors->has('available_copies')
        )
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

        @endif
    </div>

    <label for="title">Title</label>
    <input id="title" name="title" type="text" value="{{ $book->title }}"  autofocus>
    <label for="author">Author</label>
    <input id="author" name="author" type="text" value="{{ $book->author }}" >
    <label for="genre">Genre</label>
    <input id="genre" name="genre" type="text" value="{{ $book->genre }}" >
    <label for="description">Description</label>
    <input id="description" name="description" type="text" value="{{ $book->description }}" >
    <label for="publication_year">Publication Year</label>
    <input id="publication_year" name="publication_year" type="date" value="{{ $book->publication_year }}" >
    <label for="total_copies">Total Copies</label>
    <input id="total_copies" name="total_copies" type="number" value="{{ $book->total_copies }}" >
    <label for="available_copies">Available Copies</label>
    <input id="available_copies" name="available_copies" type="number" value="{{ $book->available_copies }}">
    <button type="submit">Update</button>
</form>
