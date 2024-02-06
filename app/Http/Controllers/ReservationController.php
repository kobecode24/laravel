<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{


    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations' , compact('reservations'));
    }

    public function create()
    {
        $books = Book::all();
        $users = User::all();
        return view('admin.reservations_create' , compact('books' , 'users'));
    }

    public function store(Request $request)
    {
          $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'reservation_date' => 'date_equals:today',
            'return_date' => 'after:reservation_date',
        ]);

        Reservation::create($request->all());

        $book = Book::find($request->book_id);
        $book->available_copies -= 1;
        $book->save();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
    }

    public function edit(Reservation $reservation)
    {
        $books = Book::all();
        $users = User::all();
        return view("admin.edit_reservation", compact('reservation','books',"users"));
    }

    public function update(Reservation $reservation,Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'reservation_date' => 'date_equals:today',
            'return_date' => 'after:reservation_date',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index');

    }
}
