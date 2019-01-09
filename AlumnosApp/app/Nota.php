<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = ['grade', 'curso_id', 'alumno_id'];
    
    public function cursos() {
        return $this->belongsTo('App\Curso');
    }
    
    public function alumno() {
        return $this->belongsTo('App\Alumno');
    }
}
