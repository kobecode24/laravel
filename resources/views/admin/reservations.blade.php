<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin reservation dashboard</title>
</head>
<meta charset="utf-8">
<body>
<h1>Admin dashboard</h1>
<a href="{{route("reservations.create")}}">Create</a>
<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Book</th>
        <th>User</th>
        <th>Reservation Date</th>
        <th>Return date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reservations as $reservation)
        <tr>
            <td>{{ $reservation->id }}</td>
            <td>{{ $reservation->book->title }}</td>
            <td>{{ $reservation->user->name }}</td>
            <td>{{ $reservation->reservation_date }}</td>
            <td>{{ $reservation->return_date }}</td>
            <td>
                <a href="{{route("reservations.update",$reservation->id)}}">Edit</a>
                <form method="POST" action="{{route("reservations.destroy",$reservation->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
