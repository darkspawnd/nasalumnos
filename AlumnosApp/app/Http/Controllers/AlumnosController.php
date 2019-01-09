<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App\Alumno;
use App\Curso;

class AlumnosController extends Controller
{
    public function index() {
        $alumnos = Alumno::all();
        return view('alumnos.index')->with('alumnos', $alumnos);
    }
    
    public function single($id) {
        $alumnos = Alumno::whereHas('cursos', function($q) use($id) {
            $q->where('curso_id', '=', $id);
        })->get();
        return view('alumnos.index')->with('alumnos', $alumnos);
    }
    
    public function add() {
        $info = new \stdClass();
        $info->cursos = Curso::all();
        return view('alumnos.add')->with('info', $info);
    }
    
    public function create(Request $request) {
       
       
       $this->validate($request, [
            'name' => 'required|unique:alumnos',
           'lastname' => 'required|string|max:50',
           'clave' => 'required'
        ]);
        
        $alumn = Alumno::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'code' => $request->clave
        ]);
        
        $alumn->cursos()->attach($request->cursos); 
        
        return redirect()->action('AlumnosController@index');
        
    }
}
