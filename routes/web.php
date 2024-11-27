<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlbController;

// Rotas para a gestão de arquivos GLB
Route::get('/', [GlbController::class, 'index'])->name('glb.index'); // Lista os GLBs
Route::post('/store', [GlbController::class, 'store'])->name('glb.store'); // Armazena um novo GLB
Route::get('/create', [GlbController::class, 'create'])->name('glb.create');
Route::get('/show/{filename}', [GlbController::class, 'show'])->name('glb.show'); // Exibe um GLB pelo nome
Route::get('/edit/{glb}', [GlbController::class, 'edit'])->name('glb.edit'); // Página de edição
Route::put('/update/{glb}', [GlbController::class, 'update'])->name('glb.update'); // Atualiza um GLB
Route::delete('/destroy/{glb}', [GlbController::class, 'destroy'])->name('glb.destroy'); // Remove um GLB
