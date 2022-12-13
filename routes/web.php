<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookSaverController;
use App\Http\Controllers\BookStatusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\RegisterController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/dashboard/books', BookController::class)->middleware('librarian');

Route::controller(PerpusController::class)->group(function(){
    Route::get('/', 'home');
    Route::get('/books', 'index');
    Route::get('/books/{book:slug}', 'show')->middleware('auth');
});

Route::controller(BookSaverController::class)->group(function(){
    Route::get('/dashboard/save-my-book', 'index');
});

Route::controller(BookStatusController::class)->group(function(){
    Route::get('/dashboard/status-book', 'index')->middleware('admin');
    Route::get('/dashboard/status-book/{book:slug}', 'show')->middleware('admin');
    Route::put('/dashboard/status-book/{book:slug}', 'update')->middleware('admin');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout');
    // Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('/register', 'index');
    Route::post('/register', 'store');
    Route::get('/start-librarian', 'librarian');
    Route::put('/start-librarian', 'librarian_up');
});

Route::redirect('/dashboard', '/dashboard/books');