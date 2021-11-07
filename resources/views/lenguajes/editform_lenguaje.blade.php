@extends('layouts.vistaprincipal')
@section('title', 'Editar LP')
@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

                <!--Mensaje de error-->
                @if(session("lenguajeModificado"))
                    <div class="alert alert-success">
                        {{session("lenguajeModificado")}}
                    </div>
                @endif

            <!--Validacion de errores-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card border-primary mt-5" style="background-color: #F8F8FF;">
                    <form action="{{ route('editLP', $lenguaje->id_lenguaje)}}" method="POST">
                        @csrf @method('PATCH')

                        <div class="card-header text-center text-white bg-primary">MODIFICAR LENGUAJE DE PROGRAMACION</div>

                        <div class="card-body" style="background-color: #F8F8FF;" >
                            <div class="row form-group">
                                <label for="" class="col-3">Descripcion</label>
                                <input type="text" name="lenguaje_descripcion" class="form-control col-md-8" placeholder="descripcion" value="{{$lenguaje->lenguaje_descripcion}}">
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-primary col-md-8 offset-2 text-dark mb-1" style="background-color: #00BFFF;">Modificar</button>
                                <a class="btn btn-light col-md-8 offset-2 border border-secondary" href="{{url('/lP_ruta')}}" role="button">Regresar</a>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

