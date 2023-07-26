<?php

use Illuminate\Support\Facades\Route;
use Modules\Label\Http\Controller\LabelController;

Route::prefix('v1/labels')->group(function () {
    Route::get('/all', [LabelController::class, 'getAll']);
    Route::post('/', [LabelController::class, 'createLabel']);
    Route::get('/{id}', [LabelController::class, 'getById']);
    Route::put('/{id}', [LabelController::class, 'updateLabel']);
});
