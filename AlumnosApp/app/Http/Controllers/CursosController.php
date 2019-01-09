<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;
use App\Alumno;
use App\Nota;

class CursosController extends Controller
{
    public function index() {
        $cursos = Curso::all();
        return view('cursos.index')->with('cursos', $cursos);
    }
    
    public function alumnos($id) {
        $alumnos = Alumno::whereHas('cursos', function($q) use($id) {
            $q->where('curso_id', '=', $id);
        })->get();
        
        foreach($alumnos as $alumno) {
            $alumno->curso_id = $id;
            $alumno->nota = Nota::where([
                ['alumno_id', '=', $alumno->id],
                ['curso_id', '=', $id]
            ])->first();
        }
        
        return view('cursos.alumnos')->with('alumnos', $alumnos);
    }

}
