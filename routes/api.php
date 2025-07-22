<?php
use App\Http\Controllers\Note\IndexController;
use App\Http\Controllers\Note\ShowController;
use App\Http\Controllers\Note\StoreController;
use App\Http\Controllers\Note\UpdateController;
use App\Http\Controllers\Note\DestroyController;
use Illuminate\Support\Facades\Route;

Route::prefix('notes')->group(function () {
    Route::get('/', IndexController::class);
    Route::get('/{id}', ShowController::class);
    Route::post('/', StoreController::class);
    Route::put('/{id}', UpdateController::class);
    Route::delete('/{id}', DestroyController::class);
});