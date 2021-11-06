@extends('layouts.vistaprincipal')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Criptomonedas registradas</h2>

            <a class="btn btn-success mb-4" href="{{url('/form')}}">AGREGAR</a>

            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr class="table-success">
                    <th class="border border-dark" >Logotipo</th>
                    <th class="border border-dark" >Nombre</th>
                    <th class="border border-dark" >Precio</th>
                    <th class="border border-dark" >Descripcion</th>
                    <th class="border border-dark" >Lenguaje de Programacion</th>
                    <th class="border border-dark">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($criptomonedas as $cripto)
                    <tr>
                        <td class="border border-secondary" >
                            <!--para mandar a llamar la imagen-->
                            <img src="{{ asset('storage').'/'. $cripto->logotipo}}" class="img-fluid img-thumbnail"  width="70px">
                        </td>
                        <td class="border border-secondary" >{{$cripto->nombre}}</td>
                        <td class="border border-secondary" >{{$cripto->precio}}</td>
                        <td class="border border-secondary" >{{$cripto->descripcion}}</td>
                        <td class="border border-secondary" >{{$cripto->lenguaje_descripcion}}</td><!--para la columna lenguaje_descripcion-->
                        <td class="border border-secondary">
                            <div class="btn-group"><!--Para que los bonotes-->

                                <a href="{{route('editform', $cripto->id)}}" class="btn btn-primary mb-3 mr-2">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{route('delete', $cripto->id)}}" method="POST">
                                    @csrf @method('DELETE')

                                    <button type="submit" onclick="return confirm('¿Seguro de eliminar el usuario?')" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

            {{ $criptomonedas->links() }}

        </div>
    </div>
</div>
