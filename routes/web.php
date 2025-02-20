<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home', [AdminController::class, 'index']);
});


route::get('/home', [AdminController::class, 'index']);
route::get('/category_page', [AdminController::class, 'category_page']);
route::post('/add_category', [AdminController::class, 'add_category']);
route::get('/cat_delete/{id}', [AdminController::class, 'cat_delete']);
route::get('/edit_category/{id}', [AdminController::class, 'edit_category']);
route::post('/update_category/{id}', [AdminController::class, 'update_category']);


Route::get('/add_book', [AdminController::class, 'add_book']);
Route::post('/book_stock', [AdminController::class, 'book_stock']);
Route::get('/view_books', [AdminController::class, 'view_books']);

Route::get('/view_books', [AdminController::class, 'view_books'])->name('view_books');

route::get('/books_delete/{id}', [AdminController::class, 'books_delete']);