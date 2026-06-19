<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\PagoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', ClienteController::class);
Route::resource('membresias', MembresiaController::class);
Route::resource('pagos', PagoController::class);