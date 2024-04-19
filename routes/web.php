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



Route::controller(\App\Http\Controllers\BookController::class)
    ->name('books.')
    ->group(
        function () {
            Route::get('/','index')->name('home');
            Route::get('/books', 'index')->name('index');
            Route::get('/front/books', 'index')->name('front');
            Route::get('/books/create', 'create')->name('create');
            Route::post('/books/create', 'store')->name('store');
            Route::get('/books/trash', 'trash')->name('trash');
            Route::get('/books/{id}/restore', 'restore')->name('restore');
            Route::get('/books/{id}/force-delete', 'forceDelete')->name('force-delete');
            Route::get('/books/force-delete-all', 'forceDeleteAll')->name('force-delete-all');
            Route::get('/books/{id}', 'show')->name('show');
            Route::get('/books/{id}/delete', 'delete')->name('delete');
            Route::get('/books/{id}/edit', 'edit')->name('edit');
            Route::post('/books/{book}/update', 'update')->name('update');

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
            Route::get('/chapters/{id}/edit', 'edit')->name('edit');
            Route::post('/chapters/{chapter}/update', 'update')->name('update');
            Route::get('/chapters/{id}/delete', 'delete')->name('delete');
            Route::get('/chapters/{id}/restore', 'restore')->name('restore');
            Route::get('/chapters/trash', 'trash')->name('trash');
            Route::get('/chapters/{id}/force-delete', 'forceDelete')->name('force-delete');
            Route::get('/chapters/force-delete-all', 'forceDeleteAll')->name('force-delete-all');
        }
    );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
