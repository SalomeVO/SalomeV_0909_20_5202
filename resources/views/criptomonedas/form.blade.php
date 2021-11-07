@extends('layouts.vistaprincipal')
@section('title', 'Formulario C')
@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">

            <!--Mensaje de error-->
            @if(session("criptomonedaGuardado"))
                <div class="alert alert-success text-dark">
                    {{session("criptomonedaGuardado")}}
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


            <div class="card border-success mb-3">
                <form action="{{ url ('/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card-header text-center text-white bg-success">AGREGAR CRIPTOMONEDA</div>

                    <div class="card-body" style="background-color: #F8F8FF;" >

                        <div class="row form-group">
                            <label for="" class="col-3">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-8" placeholder="nombre">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-3">Precio</label>
                            <input type="float" name="precio" class="form-control col-md-8" placeholder="00.00">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-3">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control col-md-8" placeholder="descripcion">
                        </div>

                        <!--para el formulario de imagenes-->
                        <div class="row form-group">
                            <label for="" class="col-2" >Logotipo</label>
                            <input type="file" name="logotipo" class="img-fluid">
                        </div>

                        <!--para el lenguaje de programacion-->
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

                        <div class="row form-group gap-2">
                            <button type="submit" class="btn btn-success col-md-8 offset-2 text-dark mb-1" style="background-color: #3CB371;">Guardar</button>
                            <a class="btn btn-light col-md-8 offset-2 border border-secondary" href="{{url('/')}}" role="button">Regresar</a>
                        </div>

                    </div>
                 </form>
            </div>

        </div>
    </div>
</div>
@endsection
