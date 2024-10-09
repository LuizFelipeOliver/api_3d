<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlbController;

Route::get('/', [GlbController::class, 'index']);

Route::post('/glb/store', [GlbController::class, 'store']);


