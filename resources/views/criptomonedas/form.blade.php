@extends('layouts.vistaprincipal')

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
                <form action="{{ url ('/save') }}" method="POST">
                @csrf
                    <div class="card-header text-center text-white bg-success">AGREGAR CRIPTOMONEDA</div>

                    <div class="card-body" style="background-color: #F8F8FF;" >

                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9" placeholder="nombre">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Precio</label>
                            <input type="float" name="precio" class="form-control col-md-9" placeholder="00.00">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2.7 mr-3">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control col-md-9" placeholder="descripcion">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2.7 mr-3">Logotipo</label>
                            <input type="text" name="logotipo" class="form-control col-md-9" placeholder="descripcion">
                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2 text-dark" style="background-color: #3CB371;">Guardar</button>
                        </div>

                    </div>
                 </form>
            </div>

        </div>
    </div>
</div>
