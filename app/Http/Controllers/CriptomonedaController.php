<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriptomonedaController extends Controller
{
    //para formulario
    public function form(){
        return view('criptomonedas.form');

    }
}
