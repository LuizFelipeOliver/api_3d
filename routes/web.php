<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlftController;

Route::get('/', [GlftController::class, 'index'])->name('gltf.index');
Route::get('/create', [GlftController::class, 'create'])->name('gltf.create');
Route::post('/gltf', [GlftController::class, 'store'])->name('gltf.store');
Route::get('/show/{name_3d}', [GlftController::class, 'show'])->name('gltf.show');
Route::get('/gltf/{name_3d}/edit', [GlftController::class, 'edit'])->name('gltf.edit');
Route::put('/gltf/{name_3d}', [GlftController::class, 'update'])->name('gltf.update');
Route::delete('/gltf/{name_3d}', [GlftController::class, 'destroy'])->name('gltf.destroy');
