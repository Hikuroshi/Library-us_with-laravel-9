<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BookSaverController extends Controller
{
    public function index()
    {
        return view('dashboard.book-saver.index', [
            'title' => 'Book Saver',
            'myBook' => User::where('id', auth()->user()->id)->get(),
        ]);
    }
}
