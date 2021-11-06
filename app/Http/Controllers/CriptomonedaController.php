<?php

namespace App\Http\Controllers;

use App\Criptomoneda;
use App\lenguajeProgramacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CriptomonedaController extends Controller
{
    //Lista de criptomonedas
    public function lista(){

        $criptomonedas = DB::table('criptomoneda')
            ->join('lenguaje_programacion', 'criptomoneda.lenguaje_id', '=', 'lenguaje_programacion.id_lenguaje')
            ->select('criptomoneda.*', 'lenguaje_programacion.lenguaje_descripcion')
            ->paginate(3);

        return view('criptomonedas.lista', compact('criptomonedas'));
      }

    //Formulario criptomoneda
    public function form(){

        $lenguaje=lenguajeProgramacion::all(); //para visualizar la table lenguaje_programacion

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
            'lenguaje_id'=>'required'
        ]);

        //Guardar imagenes/logotipos
        if($request->hasFile('logotipo')){
            $ver['logotipo'] = $request-> file('logotipo')->store('logotipos','public');
        }


        Criptomoneda::create([
            'nombre'=>$validator['nombre'],
            'precio'=>$validator['precio'],
            'descripcion'=> $validator['descripcion'],
            'logotipo'=>$ver['logotipo'],
            'lenguaje_id'=> $validator['lenguaje_id'],
        ]);

        return back()->with('criptomonedaGuardado', "Criptomoneda Guardada");
    }

    //Eliminar usuarios
    public function delete($id){

        $criptomoneda =Criptomoneda::findOrFail($id); //para buscar todos los datos

        //para que borre la imagen en BD y en Codigo
        if (Storage::delete('public/'.$criptomoneda->logotipo)){

            Criptomoneda::destroy($id);
        }

        return back()->with('criptomonedaEliminado', 'Criptomoneda eliminada');
    }


}
