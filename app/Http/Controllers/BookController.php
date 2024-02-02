<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.dashboard' , compact('books'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'total_copies' => 'required | integer | min:1',
            'available_copies' => 'required | integer | min:1 | lte:total_copies',
        ]);

        Book::create($data);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }


    public function update(Book $book, Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'total_copies' => 'required | integer | min:1',
            'available_copies' => 'required | integer | min:1 | lte:total_copies',
        ]);

        $book->update($data);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');

    }

    public function edit(Book $book)
    {
            return view('admin.edit', compact('book'));
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }


    public function reserve(Book $book)
    {
        if ($book->available_copies > 0) {
            $book->decrement('available_copies');

            Reservation::create([
                'user_id' => auth()->id(),
                'book_id' => $book->id,
                'reservation_date' => now(),
                'return_date' => now()->addDays(7),
            ]);
            return redirect()->route('dashboard')
                ->with('success', 'Book reserved successfully return it after 7 Days.');
        } else {
            return back()->with('error', 'No available copies to reserve.');
        }
    }

}
