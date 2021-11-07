@extends('layouts.vistaprincipal')
@section('title', 'Lista Criptomoneda')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <h2 class="text-center mb-5">Criptomonedas Registradas</h2>

            <a class="btn btn-success mb-4" href="{{url('/form')}}">AGREGAR</a>

            <!--Mensaje de criptomoneda eliminada-->
            @if(session('criptomonedaEliminado'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>
                <div class="alert alert-danger s d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{session("criptomonedaEliminado")}}
                    </div>
                </div>
            @endif

        <!--Mensaje de criptomoneda guardada-->
            @if(session("criptomonedaGuardado"))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>
                <div class="alert alert-success s d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{session("criptomonedaGuardado")}}
                    </div>
                </div>
            @endif

        <!--Mensaje de criptomoneda editada-->
            @if(session("criptomonedaModificada"))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>
                <div class="alert alert-primary s d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        {{session("criptomonedaModificada")}}
                    </div>
                </div>
            @endif

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
                        <td class="border border-secondary" >Q {{$cripto->precio}}</td>
                        <td class="border border-secondary" >{{$cripto->descripcion}}</td>
                        <td class="border border-secondary" >{{$cripto->lenguaje_descripcion}}</td><!--para la columna lenguaje_descripcion-->
                        <td class="border border-secondary">
                            <div class="btn-group"><!--Para que los bonotes-->

                                <a href="{{route('editform', $cripto->id)}}" class="btn btn-primary mb-3 mr-2">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{route('delete', $cripto->id)}}" method="POST">
                                    @csrf @method('DELETE')

                                    <button type="submit" onclick="return confirm('¿Seguro de eliminar la criptomoneda?')" class="btn btn-danger">
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
@endsection
