<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\TrainerController;
use App\Http\Controllers\API\BooksController;
use App\Http\Controllers\API\ChaptersController;
use App\Http\Middleware\EnsureTokenIsValid;

// Route::group(['prefix' => 'v1'], function(){
//     //chapters routes
//     Route::put('chapters/update', [ChaptersController::class, 'updateChapters']);
//     Route::delete('chapters/delete', [ChaptersController::class, 'deleteChapters']);

//     //books routes
//     Route::get('/books', [BooksController::class, 'listBooks']);
//     Route::get('books/{id}', [BooksController::class, 'listBooksById']);
//     Route::post('books/create', [BooksController::class, 'insertBooks']);
//     Route::put('books/update', [BooksController::class, 'updateBooks']);
//     Route::delete('books/delete', [BooksController::class, 'deleteBooks']);


// });