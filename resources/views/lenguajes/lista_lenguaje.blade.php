@extends('layouts.vistaprincipal')
@section('title', 'Tabla LP')
@section('content')
    <div class="container mt-5" action="{{url('/lP_ruta')}}">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-5">Lenguajes de Programacion Registrados</h2>

                <a class="btn btn-success mb-4" href="{{url('/formLP')}}">AGREGAR</a>

                <table class="table table-bordered table-striped text-center">
                    <thead>
                    <tr style="background-color: #9370D8;">
                        <th>ID</th>
                        <th>Descripcion</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($lenguajes as $lenguaje)
                        <tr>
                            <td>{{$lenguaje->id_lenguaje}}</td>
                            <td>{{$lenguaje->lenguaje_descripcion}}</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

                {{ $lenguajes->links() }}

            </div>
        </div>
    </div>
@endsection
