<?php

use App\Http\Controllers\MovieContoller;
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

Route::get('/movies', [MovieContoller::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieContoller::class, 'create'])->name('movies.create');
Route::post('/movies/create', [MovieContoller::class, 'store'])->name('movies.store');
Route::get('/movies/{movie}/edit', [MovieContoller::class, 'edit'])->name('movies.edit');
Route::put('/movies/{movie}', [MovieContoller::class, 'update'])->name('movies.update');
Route::delete('/movies/{movie}', [MovieContoller::class, 'destroy'])->name('movies.destroy');
