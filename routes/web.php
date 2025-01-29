<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintVanillaController;

Route::get('/', [PrintVanillaController::class, 'index']);
Route::post('print', [PrintVanillaController::class, 'print'])->name('print');
