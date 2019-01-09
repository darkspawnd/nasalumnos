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
                <div class="card-header">Crear alumno 
                </div>

                <div class="card-body">
                    @if (count($errors) > 0)
                       <div class = "alert alert-danger">
                          <ul>
                             @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                             @endforeach
                          </ul>
                       </div>
                    @endif
                    <form method='POST' action='{{ URL::action('NotasController@Create') }}'>
                        @csrf
                            <input type='hidden' name='curso_id' value="{{$info->curso_id}}" class='form-control'>
                            <input type='hidden' name='alumno_id' value="{{$info->alumno_id}}" class='form-control'>
                        <div class='form-group'>
                            <label>Nota</label>
                            <input type='text' name='grade' class='form-control'>
                        </div>
                        <div class='form-group'>
                            <input type='submit'value='Crear' class='form-control'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
