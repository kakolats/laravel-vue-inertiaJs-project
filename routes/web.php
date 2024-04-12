<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\Controller::class,'index'])->name('home');

Route::controller(\App\Http\Controllers\BookController::class)
    ->name('books.')
    ->group(
        function () {
            Route::get('/books', 'index')->name('index');
            Route::get('/front/books', 'index')->name('front');
            Route::get('/books/create', 'create')->name('create');
            Route::post('/books/create', 'store')->name('store');
            Route::get('/books/{id}', 'show')->name('show');
            Route::get('/books/{id}/delete', 'delete')->name('delete');
            Route::get('/books/{id}/edit', 'edit')->name('edit');

        }
    );

Route::controller(\App\Http\Controllers\ChapterController::class)
    ->name('chapters.')
    ->group(
        function () {
            Route::get('/chapters/{id}/show', 'show')->name('show');
            Route::get('/chapters/book/{id}', 'index')->name('bookChapters');
            Route::get('/chapters/create/{id}', 'create')->name('create');
            Route::post('/chapters/create/{id}', 'store')->name('store');
        }
    );
