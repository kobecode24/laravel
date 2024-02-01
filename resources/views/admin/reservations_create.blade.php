<html lang="en">
<head>
    <title>Admin Create</title>
</head>
<meta charset="utf-8">
<body>
<h1>Admin Reservation Create</h1>
<form method="POST" action="{{route("reservations.store")}}">
    @csrf
    @method('POST')

    <div>
        @if(
            $errors->has('book_id') ||
            $errors->has('user_id') ||
            $errors->has('reservation_date') ||
            $errors->has('return_date')
        )
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach

        @endif
    </div>

    <label for="book_id">Book</label>
    <select id="book_id" name="book_id">
        @foreach($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
    </select>
    <label for="user_id">User</label>
    <select id="user_id" name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <label for="from">From</label>
    <input id="from" name="reservation_date" type="date" value="{{ old('reservation_date') }}" >
    <label for="to">To</label>
    <input id="to" name="return_date" type="date" value="{{ old('return_date') }}" >
    <button type="submit">Create</button>
</form>
