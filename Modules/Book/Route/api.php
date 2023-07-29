<?php

use Illuminate\Support\Facades\Route;
use Modules\Book\Http\Controller\BookController;

Route::prefix('v1/books')->group(function () {
    Route::post('/', [BookController::class, 'createBook']);
});
