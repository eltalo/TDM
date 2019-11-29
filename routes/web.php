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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('partido', 'PartidoController');
Route::resource('jugador', 'JugadorController');
#Route::delete('asistencia/{id}/delete','AsistenciaController@delete');
Route::delete('asistencia/edit/{id}','AsistenciaController@show');
Route::resource('asistencia', 'AsistenciaController');
//Route::get('jugador/infopartido', 'JugadorController@infopartido');
Route::resource('informacionadicional', 'InformacionAdicionalController');
Route::resource('userinformation', 'UserInformationController');
Route::resource('contabilidad', 'ContabilidadController');
Route::resource('clase', 'ClaseController');
Route::resource('InfoAlumno', 'AlumnoController');
Route::resource('Torneo', 'TorneoController');
Route::resource('TorneoParticipante', 'TorneoParticipanteController');
Route::resource('AsignaGrupo', 'AsignaGrupoController');
