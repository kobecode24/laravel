<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
}
