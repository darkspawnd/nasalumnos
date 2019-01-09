@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-4">
            <a href="{{ URL::action('CursosController@index') }}">
                <div class="card">
                    <div class="card-body">
                        Ir a Cursos
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ URL::action('AlumnosController@index') }}">
                <div class="card">
                    <div class="card-body">
                        Ir a Alumnos
                    </div>
                </div>
            </a>
        </div>
    </div>
    <br />
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Alumnos 
                <a href="{{ URL::action('AlumnosController@add') }}" class='btn btn-primary'> Crear nuevo </a>
                </div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <thead>
                            <th> Clave </th>
                            <th> Nombre </th>
                            <th> Apellido </th>
                        </thead>
                        <tbody>
                            @foreach($alumnos as $alumno)
                                <tr>
                                    <td>{{ $alumno->code }}</td>
                                    <td>{{ $alumno->name }}</td>
                                    <td>{{ $alumno->lastname }}</td>
                                    @if(!$alumno->nota)
                                        <td><a href="{{URL::action('NotasController@Agregar', ['curso' => $alumno->curso_id, 'alumno' => $alumno->id])}}">Agregar nota</a></td>
                                    @else
                                        <td>
                                            {{$alumno->nota->grade}} puntos
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
