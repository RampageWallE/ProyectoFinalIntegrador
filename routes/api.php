<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\FacturaController;
use App\Http\Controllers\Api\ReservaController;
use App\Http\Controllers\Api\RestauranteController;


Route::controller(ProductController::class)->group(function(){
    Route::get('/products', 'index');
    Route::post('/product', 'new');
    Route::put('/product/{id}', 'update');
    Route::delete('/product/{id}', 'destroy');    
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('/clientes', 'index');
    Route::post('/cliente', 'new');
    Route::put('/cliente/{id}', 'update');
    Route::delete('/cliente/{id}', 'destroy');
});

Route::controller(FacturaController::class)->group(function(){
    Route::get('/facturas', 'index');
    Route::post('/factura', 'new');
    Route::put('/factura/{id}', 'update');
    Route::delete('/factura/{id}', 'destroy');
});

Route::controller(ReservaController::class)->group(function(){
    Route::get('/reservas', 'index');
    Route::post('reserva', 'new');
    Route::put('/reserva/{id}', 'update');
    Route::delete('/reserva/{id}', 'destroy');
});

Route::controller(RestauranteController::class)->group(function(){
    Route::get('/restaurantes', 'index');
    Route::post('/restaurante', 'new');
    Route::put('restaurante/{id}', 'update');
    Route::delete('restaurante/{id}', 'destroy');
});