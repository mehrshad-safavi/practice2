<?php

use Illuminate\Support\Facades\Route;
use Modules\Book\Http\Controller\BookController;

Route::prefix('v1/books')->group(function () {
    Route::get('/all', [BookController::class, 'getAll']);
    Route::post('/', [BookController::class, 'createBook']);
    Route::prefix('/{id}')->group(function () {
        Route::get('', [BookController::class, 'getById']);
        Route::put('', [BookController::class, 'updateBook']);
        Route::delete('', [BookController::class, 'deleteBook']);
    });
});
