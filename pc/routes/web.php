<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pcs', [PcController::class, 'index'])->name('pcs.index');
Route::get('/pcs/create', [PcController::class, 'create'])->name('pcs.create');
Route::post('/pcs', [PcController::class, 'store'])->name('pcs.store');
Route::get('/pcs/{id}/edit', [PcController::class, 'edit'])->name('pcs.edit');
Route::patch('/pcs/{id}', [PcController::class, 'update'])->name('pcs.update');
Route::delete('/pcs/{id}', [PcController::class, 'destroy'])->name('pcs.destroy');