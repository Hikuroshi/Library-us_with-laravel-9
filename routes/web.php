<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerpusController;
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

Route::resource('/dashboard/books', BookController::class)->middleware('auth');

Route::controller(PerpusController::class)->group(function(){
    Route::get('/', 'home');
    Route::get('/books/{book:slug}', 'show');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('/register', 'index')->middleware('auth');
    Route::post('/register', 'store');
});

Route::redirect('/dashboard', '/dashboard/books');