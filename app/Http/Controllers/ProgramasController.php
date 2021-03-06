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

    //Guardar lenguaje de programacion
    public function guardar(Request $request)
    {
        $validator_l = $this->validate($request, [
            'lenguaje_descripcion'=>'required|string|max:45|unique:lenguaje_programacion',
        ]);

        lenguajeProgramacion::create([
            'lenguaje_descripcion'=> $validator_l['lenguaje_descripcion'],
        ]);

        return redirect('/lP_ruta')->with('lenguajeGuardado', "Lenguaje Guardado");
    }

    //Eliminar lenguaje de programacion
    public function deleteLP($id_lenguaje){

        lenguajeProgramacion::destroy($id_lenguaje);

        return redirect('/lP_ruta')->with('lenguajeEliminado', 'Lenguaje Eliminado');
    }

    //Formulario para editar lenguajes de programacion
    public function editformLP($id_lenguaje){

        $lenguaje= lenguajeProgramacion::findOrFail($id_lenguaje);
        return view('lenguajes.editform_lenguaje', compact('lenguaje'));
    }

    //Editar lenguajes
    public function editLP(Request $request, $id_lenguaje){

        $datosLP = request()->except((['_token', '_method']));
        lenguajeProgramacion::where('id_lenguaje', '=', $id_lenguaje)->update($datosLP);

        return redirect('/lP_ruta')->with('lenguajeModificado','Lenguaje Modificado');
    }
}
