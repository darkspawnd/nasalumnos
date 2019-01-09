<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Curso;

class Alumno extends Model
{
    protected $fillable = ['name', 'lastname', 'code'];
    
    public function cursos() {
        return $this->belongsToMany('App\Curso');
    } 
}
