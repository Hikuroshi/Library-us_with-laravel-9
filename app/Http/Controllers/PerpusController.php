<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PerpusController extends Controller
{
    public function home()
    {
        return view('index', [
            'title' => 'Perpustakaan Milik Kita',
            'books' => Book::latest()->paginate(5),
            'categories' => Category::all()
        ]);
    }

    public function show(Book $book){
        return view('book', [
            "title" => $book->name,
            "book" => $book,
        ]);
    }
}
