<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookSaverController extends Controller
{
    public function index()
    {
        return view('dashboard.book-saver.index', [
            'title' => 'Book Saver',
            'book_sv' => Book
        ])
    }
}
