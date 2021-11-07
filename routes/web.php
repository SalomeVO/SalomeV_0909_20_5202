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

//para visualizar la lista de criptomonedas
Route::get('/', "CriptomonedaController@lista");

//para llegar al formulario
Route::get("/form", "CriptomonedaController@form");

//para aguardar criptomonedas
Route::post("/save", "CriptomonedaController@save")->name("save");

//para eliminar criptomonedas
Route::delete("/delete/{id}","CriptomonedaController@delete")->name("delete");

//para llegar a formulario editar criptomonedas
Route::get("editform/{id}", "CriptomonedaController@editform")->name('editform');

//para editar criptomoneda
Route::patch("/edit/{id}","CriptomonedaController@edit")->name("edit");



//para visualizar la lista de lenguaje de programacion
Route::get('/lP_ruta', 'ProgramasController@lP_ruta')->name('lP_ruta');

//para llegar al formulario de lenguaje de programacion
Route::get('/formLP', "ProgramasController@formLP");

