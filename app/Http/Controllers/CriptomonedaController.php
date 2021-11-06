<?php

namespace App\Http\Controllers;

use App\Criptomoneda;
use App\lenguajeProgramacion;
use Illuminate\Http\Request;

class CriptomonedaController extends Controller
{
    //Formulario criptomoneda
    public function form(){

        $lenguaje=lenguajeProgramacion::all();

        return view('criptomonedas.form', compact('lenguaje'));
    }

    //Guardar criptomonedas
    public function save(Request $request)
    {
        $validator = $this->validate($request, [
            'nombre' => 'required|string|max:45',
            'precio' => 'required',
            'descripcion'=>'required|string|max:200',
            'logotipo' => 'required',
        ]);

        Criptomoneda::create([
            'nombre'=>$validator['nombre'],
            'precio'=>$validator['precio'],
            'descripcion'=> $validator['descripcion'],
            'logotipo'=>$validator['logotipo'],
        ]);

        return back()->with('criptomonedaGuardado', "Criptomoneda Guardada");
    }
}
