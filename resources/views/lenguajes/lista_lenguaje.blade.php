@extends('layouts.vistaprincipal')
@section('title', 'Tabla LP')
@section('content')
    <div class="container mt-5" action="{{url('/lP_ruta')}}">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-5">LENGUAJES DE PROGRAMACION</h2>

                <a class="btn btn-success mb-4" href="{{url('/formLP')}}">AGREGAR</a>

                <!--Mensaje de lenguaje guardado-->
                @if(session("lenguajeGuardado"))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-success s d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            {{session("lenguajeGuardado")}}
                        </div>
                    </div>
                @endif

                <!--Mensaje de lenguaje eliminado-->
                @if(session('lenguajeEliminado'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-danger s d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            {{session("lenguajeEliminado")}}
                        </div>
                    </div>
                @endif

            <!--Mensaje de lenguaje modificado-->
                @if(session("lenguajeModificado"))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-primary s d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            {{session("lenguajeModificado")}}
                        </div>
                    </div>
                @endif

                <table class="table table-striped table-hover text-center">
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
