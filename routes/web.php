<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Object3DController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/object3d/{id}', function ($id) {
    return view('object3d', ['objectId' => $id]);
});

Route::get('/api/objects', [Object3DController::class, 'index']);
Route::post('/api/objects', [Object3DController::class, 'store']);
Route::get('/api/objects/{id}', [Object3DController::class, 'show']);
Route::put('/api/objects/{id}', [Object3DController::class, 'update']);
Route::delete('/api/objects/{id}', [Object3DController::class, 'destroy']);