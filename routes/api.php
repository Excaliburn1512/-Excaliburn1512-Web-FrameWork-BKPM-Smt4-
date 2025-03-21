<?php

use App\Http\Controllers\ApiPendidikanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pendidikan', [ApiPendidikanController::class, 'getAll']);
Route::get('/pendidikan/{id}', [ApiPendidikanController::class, 'getPen']);
Route::post('/pendidikan', [ApiPendidikanController::class, 'createPen']);
Route::put('/pendidikan/{id}', [ApiPendidikanController::class, 'updatePen']);
Route::delete('/pendidikan/{id}', [ApiPendidikanController::class, 'deletePen']);