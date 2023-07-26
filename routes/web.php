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

Route::get('/', [App\Http\Controllers\InicioConsultaController::class, 'index']);

Route::get('/inicio', [App\Http\Controllers\InicioConsultaController::class, 'index']);

//ruta genero
Route::get('/genero', [App\Http\Controllers\GeneroController::class, 'index']);

//ruta acompañante
Route::get('/acompañante', [App\Http\Controllers\AcompañanteController::class, 'index']);

//ruta Estado Civil
Route::get('/estadocivil', [App\Http\Controllers\EstadoCivilController::class, 'index']);

//ruta Instruccion
Route::get('/instruccion', [App\Http\Controllers\InstruccionController::class, 'index']);

//ruta Persona
Route::get('/persona', [App\Http\Controllers\PersonaController::class, 'index']);

//ruta Area
Route::get('/area', [App\Http\Controllers\AreaController::class, 'index']);

//ruta Paciemte
Route::get('/paciente', [App\Http\Controllers\PacienteController::class, 'index']);
//Route::resource('/paciente/create', 'PacienteController');

//Ruta Cita
Route::get('/cita', [App\Http\Controllers\CitaController::class, 'index']);

Route::get('/cita/create/{doc}', [App\Http\Controllers\CitaController::class, 'create']);
Route::get('/cita/create?doc={id}', [App\Http\Controllers\CitaController::class, 'create']);

//ruta persona
Route::get('/persona', [App\Http\Controllers\PersonaController::class, 'index']);

//ruta Comprobante
Route::get('/comprobante', [App\Http\Controllers\ComprobanteController::class, 'index']);
