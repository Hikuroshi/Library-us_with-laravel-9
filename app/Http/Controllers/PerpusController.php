<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
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

    public function index()
    {
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('books', [
            'title' => 'All Books' . $title,
            'books' => Book::latest()->filter(request(['search', 'author', 'category']))->paginate(10)->withQueryString(),
            'categories' => Category::all()
        ]);
    }

}
