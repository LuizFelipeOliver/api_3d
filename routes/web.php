<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlftController ;

Route::get('/gltf', [GlftController::class, 'index'])->name('gltf.index');
Route::get('/gltf/create', [GlftController::class, 'create'])->name('gltf.create');
Route::post('/gltf', [GlftController::class, 'store'])->name('gltf.store');
Route::get('/gltf/{gltf}', [GlftController::class, 'show'])->name('gltf.show');
Route::get('/gltf/{gltf}/edit', [GlftController::class, 'edit'])->name('gltf.edit');
Route::put('/gltf/{gltf}', [GlftController::class, 'update'])->name('gltf.update');
Route::delete('/gltf/{gltf}', [GlftController::class, 'destroy'])->name('gltf.destroy');