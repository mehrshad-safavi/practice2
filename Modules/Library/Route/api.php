<?php

use Illuminate\Support\Facades\Route;
use Modules\Library\Http\Controller\LibraryController;

Route::prefix('v1/library')->group(function () {
    Route::post('{id}/addBook', [LibraryController::class, 'addBook']);
});
