<?php

namespace App\Http\Controllers;

use App\lenguajeProgramacion;
use Illuminate\Http\Request;

class ProgramasController extends Controller
{
    //para la lista
    public function lP_ruta(){
        $data['lenguajes'] = lenguajeProgramacion::paginate(3);

        return view('lenguajes.lista_lenguaje', $data);
    }

    //Formulario lenguaje de programacion
    public function formLP(){

        return view('lenguajes.form_lenguaje');
    }

    //Guardar criptomonedas
    public function guardar(Request $request)
    {
        $validator_l = $this->validate($request, [
            'lenguaje_descripcion'=>'required|string|max:45',
        ]);

        lenguajeProgramacion::create([
            'lenguaje_descripcion'=> $validator_l['lenguaje_descripcion'],
        ]);

        return back()->with('lenguajeGuardado', "Criptomoneda Guardada");
    }
}
