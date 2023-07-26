<?php

use Illuminate\Support\Facades\Route;
use Modules\Label\Http\Controller\LabelController;

Route::prefix('v1/labels')->group(function () {
    Route::post('/', [LabelController::class, 'createLabel']);
    Route::get('/{id}', [LabelController::class, 'getById']);
});
