<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
//     return view('books');
// });
Route::get('/books', [BookController::class, 'index'])->name('books.create');

Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/create', [BookController::class, 'store'])->name('books.store');

Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::post('/books/{id}/edit', [BookController::class, 'update'])->name('books.update');

Route::get('/books/{id}/destroy', [BookController::class, 'destroy'])->name('books.destroy');