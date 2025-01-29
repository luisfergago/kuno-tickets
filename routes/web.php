<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintFGLController;
use App\Http\Controllers\WebClientController;
use App\Http\Controllers\PrintVanillaController;

Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index']);
Route::get('home/index', [HomeController::class, 'index']);
Route::get('home/printFGL', [HomeController::class, 'printFGL']);
Route::get('PrintFGLController', [PrintFGLController::class, 'printCommands']);
Route::any('WebClientController', [WebClientController::class, 'processRequest']);

Route::post('print', [PrintVanillaController::class, 'print'])->name('print');
Route::get('vanilla', [PrintVanillaController::class, 'index']);
