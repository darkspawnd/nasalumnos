<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/cursos', 'CursosController@index');
    Route::get('/curso/{id}/alumnos', 'CursosController@alumnos');
        
    Route::get('/alumnos', 'AlumnosController@index');
    Route::get('/alumno', 'AlumnosController@single');
    Route::get('/alumno/curso/{id}/notas', 'AlumnosController@notas');
    
    Route::get('/alumno/nuevo', 'AlumnosController@add');
    Route::post('/alumno/crear', 'AlumnosController@create');
    
    Route::get('/alumno/curso/{id}/agregarNota', 'AlumnosController@AgregarNota');
    Route::post('/alumno/curso/nuevaNota', 'AlumnosController@CrearNota');
    
});

