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

Route::get('/', function () {
    return view('criptomonedas.lista');
});

//para llegar al formulario
Route::get("/form", "CriptomonedaController@form");

//aguardar criptomonedas
Route::post("/save", "CriptomonedaController@save")->name("save");
