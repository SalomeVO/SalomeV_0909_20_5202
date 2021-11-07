@extends('layouts.vistaprincipal')
@section('title', 'Tabla LP')
@section('content')
    <div class="container mt-5" action="{{url('/lP_ruta')}}">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-5">Lenguajes de Programacion Registrados</h2>

                <a class="btn btn-success mb-4" href="{{url('/formLP')}}">AGREGAR</a>

                <!--Mensaje de lenguaje eliminado-->
                @if(session('lenguajeEliminado'))
                    <div class="alert alert-danger">
                        {{session('lenguajeEliminado')}}
                    </div>
                @endif


                <table class="table table-bordered table-striped text-center">
                    <thead style="background-color: #D8BFD8;">
                    <tr>
                        <th class="border border-dark" >ID</th>
                        <th class="border border-dark" >Descripcion</th>
                        <th class="border border-dark" >Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($lenguajes as $lenguaje)
                        <tr>
                            <td class="border border-secondary" >{{$lenguaje->id_lenguaje}}</td>
                            <td class="border border-secondary" >{{$lenguaje->lenguaje_descripcion}}</td>
                            <td class="border border-secondary" >
                                <div class="btn-group"><!--Para que los bonotes-->

                                    <a href="{{route('editformLP', $lenguaje->id_lenguaje)}}" class="btn btn-primary mb-3 mr-2">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{route('deleteLP', $lenguaje->id_lenguaje)}}" method="POST">
                                        @csrf @method('DELETE')

                                        <button type="submit" onclick="return confirm('¿Seguro de eliminar el lenguaje de programacion?')" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

                {{ $lenguajes->links() }}

            </div>
        </div>
    </div>
@endsection
