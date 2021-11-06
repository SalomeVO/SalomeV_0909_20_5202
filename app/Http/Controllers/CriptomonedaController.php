<?php

namespace App\Http\Controllers;

use App\Criptomoneda;
use App\lenguajeProgramacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CriptomonedaController extends Controller
{
    //Formulario criptomoneda
    public function form(){

        return view('criptomonedas.form');
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

        //condiciones para guardar imagenes

        if($request->hasFile('logotipo')){
            $ver['logotipo'] = $request-> file('logotipo')->store('logotipos','public');
        }


        Criptomoneda::create([
            'nombre'=>$validator['nombre'],
            'precio'=>$validator['precio'],
            'descripcion'=> $validator['descripcion'],
            'logotipo'=>$ver['logotipo'],
        ]);

        return back()->with('criptomonedaGuardado', "Criptomoneda Guardada");
    }
}
