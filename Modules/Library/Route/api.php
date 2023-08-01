<?php

use Illuminate\Support\Facades\Route;
use Modules\Library\Http\Controller\LibraryController;

Route::prefix('v1/library')->group(function () {
    Route::get('/{id}', [LibraryController::class, 'show']);
    Route::post('/{id}/addBook', [LibraryController::class, 'addBook']);
    Route::delete('/{id}/removeBook', [LibraryController::class, 'delete']);
});
