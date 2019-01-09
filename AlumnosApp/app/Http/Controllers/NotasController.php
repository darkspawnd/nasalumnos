<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

use App\Nota;

class NotasController extends Controller
{
    public function Agregar($curso, $alumno) {
        $info = new \stdClass();
        $info->curso_id = $curso;
        $info->alumno_id = $alumno;
        return view('notas.agregar')->with('info', $info);
    }
    
    public function Create(Request $request) {
        $this->validate($request, [
           'grade' => 'required'
        ]);
        Nota::create([
            'grade' => $request->grade,
            'curso_id' => $request->curso_id,
            'alumno_id' => $request->alumno_id
        ]);
        return redirect()->action('CursosController@alumnos', ['id' => $request->curso_id]);
    }
}
