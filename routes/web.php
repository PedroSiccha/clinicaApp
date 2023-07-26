<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/', 'InicioConsultaController');

Route::resource('/inicio', 'InicioConsultaController');

//ruta genero
Route::resource('/genero', 'GeneroController');

//ruta acompañante
Route::resource('/acompañante', 'AcompañanteController');

//ruta Estado Civil
Route::resource('/estadocivil', 'EstadoCivilController');

//ruta Instruccion
Route::resource('/instruccion', 'InstruccionController');

//ruta Persona
Route::resource('/persona', 'PersonaController');

//ruta Area
Route::resource('/area', 'AreaController');

//ruta Paciemte
Route::resource('/paciente', 'PacienteController');
//Route::resource('/paciente/create', 'PacienteController');

//Ruta Cita
Route::resource('/cita', 'CitaController');

Route::get('/cita/create/{doc}', 'CitaController@create');
Route::get('/cita/create?doc={id}', 'CitaController@create');

//ruta persona
Route::resource('/persona', 'PersonaController');

//ruta Comprobante
Route::resource('/comprobante', 'ComprobanteController');
