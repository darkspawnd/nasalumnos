<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Alumno;

class Curso extends Model
{
    
    public function alumnos() {
        return $this->belongsToMany('App\Alumno');
    }
    
    public function notas() {
        return $this->hasMany('App\Nota');
    }
    
}
