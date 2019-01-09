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
                <div class="card-header">Cursos</div>

                <div class="card-body">
                    <table class='table table-bordered'>
                        <thead>
                            <th> Nombre </th>
                        </thead>
                        <tbody>
                            @foreach($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->name }}</td>
                                    <td><a href="{{ URL::action('CursosController@alumnos', ['id' => $curso->id]) }}">Ver Alumnos</a> </td>
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
