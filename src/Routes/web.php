<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Atlas\Controllers\AtlasController;

// Location where we load an create the translation based in the lang region
Route::group([
    'middleware' => ['web']
], function () {
    Route::get('/atlas/translation.js', [AtlasController::class, 'generate'])
        ->name('atlas.translate');
});
