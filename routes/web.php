<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/reload", "GoogleController@index")->name('reload');
Route::get("/coordenadas", "GoogleController@obtenerCoordenadas")->name('coordenadas');

Route::get('/', function () {
    return view('googleAutocomplete');
});
