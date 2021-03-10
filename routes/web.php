<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\CommentController;

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

Route::get('/publications', [PublicationController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/publications/create', [PublicationController::class, 'create'])->middleware(['auth'])->name('publication.create');
Route::post('/publications', [PublicationController::class, 'store'])->middleware(['auth'])->name('publication.store');
Route::get('/publications/{publication}', [PublicationController::class, 'show'])->middleware(['auth'])->name('publication.show');
Route::get('/publications/{publication}/edit', [PublicationController::class, 'edit'])->middleware(['auth'])->name('publication.edit');
Route::patch('/publications/{publication}', [PublicationController::class, 'update'])->middleware(['auth'])->name('publication.update');
Route::delete('/publications/{publication}', [PublicationController::class, 'destroy'])->middleware(['auth'])->name('publication.destroy');

Route::patch('/comments/{comment}', [CommentController::class, 'approveComment'])->middleware(['auth'])->name('comment.approve');
Route::post('/comments', [CommentController::class, 'store'])->middleware(['auth'])->name('comment.store');
require __DIR__.'/auth.php';
