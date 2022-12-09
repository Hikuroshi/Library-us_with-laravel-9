<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.books.index', [
            'title' => 'Library dashboard',
            'books' => Book::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create', [
            'title' => 'Add a new book',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'writer' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required',
            'cover' => 'required|image|file|max:512',
            'books_file' => 'required|mimes:pdf|file|max:10000'
        ]);

        $validatedData['name'] = ucwords($request->name);
        $validatedData['writer'] = ucwords($request->writer);
        $validatedData['cover'] = $request->file('cover')->store('cover-store');
        $validatedData['books_file'] = $request->file('books_file')->store('books-store');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::of($request->name . "-" . Str::random(40))->slug('-');

        Book::create($validatedData);
        return redirect('/dashboard/books')->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('dashboard.books.show', [
            'title' => 'Book Details',
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit', [
            'title' => 'Update book data',
            'book' => $book,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'writer' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required',
            'cover' => 'image|file|max:512',
            'books_file' => 'mimes:pdf|file|max:10000'
        ]);

        if ($request->file('cover')) {
            if($request->oldCover){
                Storage::delete($request->oldCover);
            }
            $validatedData['cover'] = $request->file('cover')->store('cover-store');
        }

        if ($request->file('books_file')) {
            if($request->oldBook){
                Storage::delete($request->oldBook);
            }
            $validatedData['books_file'] = $request->file('books_file')->store('books-store');
        }

        $validatedData['name'] = ucwords($request->name);
        $validatedData['writer'] = ucwords($request->writer);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = Str::of($request->name . "-" . Str::random(40))->slug('-');

        Book::where('id', $book->id)->update($validatedData);
        return redirect('/dashboard/books')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book->books_file || $book->cover) {
            Storage::delete($book->books_file, $book->cover);
        }
        Book::destroy($book->id);
        return redirect('/dashboard/books')->with('success', 'Book deleted successfully!');
    }
}
