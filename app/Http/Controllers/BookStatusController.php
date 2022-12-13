<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookStatusController extends Controller
{
    public function index()
    {
        return view('dashboard.book-status.index', [
            'title' => 'Book Status',
            'books' => Book::all()
        ]);
    }

    public function show(Book $book)
    {
        return view('dashboard.book-status.show', [
            'title' => 'Book Status Details',
            'book' => $book
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        Book::where('id', $book->id)->update($validatedData);
        return redirect('/dashboard/status-book')->with('success', 'Status has been updated!');
    }
}
