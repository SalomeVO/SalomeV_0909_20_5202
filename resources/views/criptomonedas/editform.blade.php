@extends('layouts.vistaprincipal')
@section('title', 'Edit C')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            <!--Mensaje de error-->
            @if(session("criptomonedaModificada"))
                <div class="alert alert-success">
                    {{session("criptomonedaModificada")}}
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

            <div class="card border-primary" style="background-color: #F8F8FF;">
                <form action="{{ route('edit', $criptomoneda->id)}}" method="POST" enctype="multipart/form-data"><!--para que acepte imagenes-->
                    @csrf @method('PATCH')

                    <div class="card-header text-center text-white bg-primary">MODIFICAR CRIPTOMONEDA</div>

                    <div class="card-body">

                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9" value="{{ $criptomoneda->nombre }}" placeholder="nombre">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Precio</label>
                            <input type="float" name="precio" class="form-control col-md-9" value="{{ $criptomoneda->precio }}" placeholder="00.00">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2.7 mr-3">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control col-md-9" value="{{ $criptomoneda->descripcion}}" placeholder="descripcion">
                        </div>

                        <!--para imagenes-->
                        <div class="row form-group">
                            <label for="" class="col-2">Imagen</label>
                            <img src="{{asset('storage').'/'.$criptomoneda->logotipo}}" class="img-fluid img-thumbnail"  width="70px">
                            <input type="file" name="logotipo" class="hidden" value="{{ $criptomoneda->logotipo}}">
                        </div>

                        <!--Lenguaje de programacion-->
                        <div class="row mb-3">
                            <div class="col-6 offset-3">
                                <div class="form-group">
                                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Lenguaje de Programacion</label>
                                    <select name="lenguaje_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect" >
                                        <option class="align-self-center text-center" value="">--Lenguaje de Programacion--</option>

                                        @foreach($lenguaje as $lenguajes)
                                            <option value="{{$lenguajes->id_lenguaje}}"> {{$lenguajes->lenguaje_descripcion}}  </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-primary col-md-9 offset-2 text-dark" style="background-color: #00BFFF;">Modificar</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

