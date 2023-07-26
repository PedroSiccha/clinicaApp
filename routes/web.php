<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return view('/auth/login');
});

//Rutas Para inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas Para citas
Route::get('/cita', [App\Http\Controllers\CitaController::class, 'index'])->name('cita');
Route::get('/cantidadcita', [App\Http\Controllers\CitaController::class, 'Graficacantidad'])->name('graficaAdmision');
Route::get('/cita/examen', [App\Http\Controllers\CitaController::class, 'examen'])->name('cita.examen');
Route::get('/cita/show', [App\Http\Controllers\CitaController::class, 'show'])->name('cita.show');
Route::get('/cita/create', [App\Http\Controllers\CitaController::class, 'create'])->name('cita.create');
Route::get('/cita/createE/{id}', [App\Http\Controllers\CitaController::class, 'createExiste'])->name('cita.createExiste');
Route::get('/cita/createN/{id}', [App\Http\Controllers\CitaController::class, 'createnoExiste'])->name('cita.createnoExiste');
Route::post('/cita/store', [App\Http\Controllers\CitaController::class, 'store'])->name('cita.store');
Route::post('/cita/storeExamen', [App\Http\Controllers\CitaController::class, 'storeExamen'])->name('cita.storeExamen');
Route::get('/cita/edit/{id}', [App\Http\Controllers\CitaController::class, 'edit'])->name('cita.edit');
Route::post('/cita/guardar', [App\Http\Controllers\CitaController::class, 'update'])->name('cita.guardar');
Route::get('/cita/{id}', [App\Http\Controllers\CitaController::class, 'destroy'])->name('cita.destroy');
Route::get('cita-list-pdf', [App\Http\Controllers\CitaController::class, 'exportPDF'])->name('cita.pdf');
Route::get('cita-ticket-pdf/{id}', [App\Http\Controllers\CitaController::class, 'ticketPDF'])->name('cita.ticket'); 
//Route::post('acompanante', 'CitaController@buscaracompanante')->name('acompanante');  
Route::post('citaa/existeAcom', [App\Http\Controllers\CitaController::class, 'acompanante'])->name('citaa.existAcom');
Route::post('/compararCita', [App\Http\Controllers\CitaController::class, 'comparar'])->name('comparar.cita');
Route::post('/verificarDNI', [App\Http\Controllers\CitaController::class, 'verificarDNI'])->name('verificarDNI');

//Rutas Para Perfil
Route::get('/perfil', [App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
Route::get('/perfil/{id}', [App\Http\Controllers\PerfilController::class, 'show'])->name('perfil.show');
Route::get('/perfil/create', [App\Http\Controllers\PerfilController::class, 'create'])->name('perfil.create');
Route::post('/perfil/store', [App\Http\Controllers\PerfilController::class, 'store'])->name('perfil.store');
Route::get('/perfil/edit/{id}', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil.edit');
Route::get('/perfil/{id}', [App\Http\Controllers\PerfilController::class, 'update'])->name('perfil.update');
Route::get('/perfil/{id}', [App\Http\Controllers\PerfilController::class, 'destroy'])->name('perfil.destroy');

//Rutas Para Genero
Route::get('/genero', [App\Http\Controllers\GeneroController::class, 'index'])->name('genero');
Route::get('/genero/{id}', [App\Http\Controllers\GeneroController::class, 'show'])->name('genero.show');
Route::get('/genero/create', [App\Http\Controllers\GeneroController::class, 'create'])->name('genero.create');
Route::post('/genero/store', [App\Http\Controllers\GeneroController::class, 'store'])->name('genero.store');
Route::post('/genero/editar', [App\Http\Controllers\GeneroController::class, 'editar'])->name('genero.editar');
Route::post('/genero/guardar', [App\Http\Controllers\GeneroController::class, 'guardar'])->name('genero.guardar');
Route::post('/genero/eliminar', [App\Http\Controllers\GeneroController::class, 'eliminar'])->name('genero.eliminar');
Route::get('/genero/edit/{id}', [App\Http\Controllers\GeneroController::class, 'edit'])->name('genero.edit');
Route::put('/genero/{id}', [App\Http\Controllers\GeneroController::class, 'update'])->name('genero.update');
Route::get('/genero/{id}', [App\Http\Controllers\GeneroController::class, 'destroy'])->name('genero.destroy');

//Rutas Para EstadoCivil
Route::get('/estadocivil', [App\Http\Controllers\EstadocivilController::class, 'index'])->name('estadocivil');
Route::get('/estadocivil/{id}', [App\Http\Controllers\EstadocivilController::class, 'show'])->name('estadocivil.show');
Route::get('/estadocivil/create', [App\Http\Controllers\EstadocivilController::class, 'create'])->name('estadocivil.create');
Route::post('/estadocivil/store', [App\Http\Controllers\EstadocivilController::class, 'store'])->name('estadocivil.store');
Route::post('/estadocivil/guardar', [App\Http\Controllers\EstadocivilController::class, 'guardar'])->name('estadocivil.guardar');
Route::post('/estadocivil/editar', [App\Http\Controllers\EstadocivilController::class, 'editar'])->name('estadocivil.editar');
Route::post('/estadocivil/eliminar', [App\Http\Controllers\EstadocivilController::class, 'eliminar'])->name('estadocivil.eliminar');
Route::get('/estadocivil/{id}', [App\Http\Controllers\EstadocivilController::class, 'update'])->name('estadocivil.update');
Route::get('/estadocivil/{id}', [App\Http\Controllers\EstadocivilController::class, 'destroy'])->name('estadocivil.destroy');

//Rutas Para Instruccion
Route::get('/instruccion', [App\Http\Controllers\InstruccionController::class, 'index'])->name('instruccion');
Route::get('/instruccion/{id}', [App\Http\Controllers\InstruccionController::class, 'show'])->name('instruccion.show');
Route::get('/instruccion/create', [App\Http\Controllers\InstruccionController::class, 'create'])->name('instruccion.create');
Route::post('/instruccion/store', [App\Http\Controllers\InstruccionController::class, 'store'])->name('instruccion.store');
Route::post('/instruccion/guardar', [App\Http\Controllers\InstruccionController::class, 'guardar'])->name('instruccion.guardar');
Route::post('/instruccion/editar', [App\Http\Controllers\InstruccionController::class, 'editar'])->name('instruccion.editar');
Route::post('/instruccion/eliminar', [App\Http\Controllers\InstruccionController::class, 'eliminar'])->name('instruccion.eliminar');
Route::get('/instruccion/edit/{id}', [App\Http\Controllers\InstruccionController::class, 'edit'])->name('instruccion.edit');
Route::get('/instruccion/{id}', [App\Http\Controllers\InstruccionController::class, 'update'])->name('instruccion.update');
Route::get('/instruccion/{id}', [App\Http\Controllers\InstruccionController::class, 'destroy'])->name('instruccion.destroy');

//Rutas Para Ocupacion
Route::get('/ocupacion', [App\Http\Controllers\OcupacionController::class, 'index'])->name('ocupacion');
Route::get('/ocupacion/{id}', [App\Http\Controllers\OcupacionController::class, 'show'])->name('ocupacion.show');
Route::get('/ocupacion/create', [App\Http\Controllers\OcupacionController::class, 'create'])->name('ocupacion.create');
Route::post('/ocupacion/store', [App\Http\Controllers\OcupacionController::class, 'store'])->name('ocupacion.store');
Route::post('/ocupacion/guardar', [App\Http\Controllers\OcupacionController::class, 'guardar'])->name('ocupacion.guardar');
Route::post('/ocupacion/editar', [App\Http\Controllers\OcupacionController::class, 'editar'])->name('ocupacion.editar');
Route::post('/ocupacion/eliminar', [App\Http\Controllers\OcupacionController::class, 'eliminar'])->name('ocupacion.eliminar');
Route::get('/ocupacion/edit/{id}', [App\Http\Controllers\OcupacionController::class, 'edit'])->name('ocupacion.edit');
Route::get('/ocupacion/{id}', [App\Http\Controllers\OcupacionController::class, 'update'])->name('ocupacion.update');
Route::get('/ocupacion/{id}', [App\Http\Controllers\OcupacionController::class, 'destroy'])->name('ocupacion.destroy');

//Rutas Para Configuracion
Route::get('/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('configuracion');
Route::get('/configuracion/{id}', [App\Http\Controllers\ConfiguracionController::class, 'show'])->name('configuracion.show');
Route::get('/configuracion/create', [App\Http\Controllers\ConfiguracionController::class, 'create'])->name('configuracion.create');
Route::post('/configuracion/store', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('configuracion.store');
Route::get('/configuracion/edit/{id}', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('configuracion.edit');
Route::put('/configuracion/{id}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('configuracion.update');
Route::post('/configuracion/delete', [App\Http\Controllers\ConfiguracionController::class, 'destroy'])->name('configuracion.destroy');

//Rutas Para CONFIGMEDICO
Route::get('/configmedico', [App\Http\Controllers\ConfmedicoController::class, 'index'])->name('configmedico');
Route::get('/configmedico/{id}', [App\Http\Controllers\ConfmedicoController::class, 'show'])->name('configmedico.show'); 
Route::get('/configmedico/create', [App\Http\Controllers\ConfmedicoController::class, 'create'])->name('configmedico.create');
Route::post('/configmedico/store', [App\Http\Controllers\ConfmedicoController::class, 'store'])->name('configmedico.store');
Route::get('/configmedico/edit/{id}', [App\Http\Controllers\ConfmedicoController::class, 'edit'])->name('configmedico.edit');
Route::put('/configmedico/{id}', [App\Http\Controllers\ConfmedicoController::class, 'update'])->name('configmeico.update');
Route::delete('/configmedico/{id}', [App\Http\Controllers\ConfmedicoController::class, 'destroy'])->name('configmedico.destroy');

//Rutas Para Paciente
Route::get('/paciente', [App\Http\Controllers\PacienteController::class, 'index'])->name('paciente');
Route::get('/paciente/crear_reporte_porpaciente', [App\Http\Controllers\PacienteController::class, 'crear_reporte_porpaciente'])->name('paciente.crear_reporte_porpaciente');
Route::get('/paciente/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('perfilUsuario');
Route::get('/paciente/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('paciente.create');
Route::get('/paciente/createE/{id}', [App\Http\Controllers\PacienteController::class, 'create'])->name('paciente.createE');
Route::post('/paciente/store', [App\Http\Controllers\PacienteController::class, 'store'])->name('paciente.store');
Route::get('/paciente/edit/{id}', [App\Http\Controllers\PacienteController::class, 'edit'])->name('paciente.edit');
Route::put('/paciente/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('paciente.update');
Route::delete('/paciente/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('paciente.destroy');
Route::post('/paciente/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('paciente.edit');
Route::post('/paciente/eliminar', [App\Http\Controllers\PacienteController::class, 'eliminar'])->name('paciente.delete'); 

//Rutas Para Roles
Route::get('/rol', [App\Http\Controllers\RolController::class, 'index'])->name('rol');
Route::get('/rol/create', [App\Http\Controllers\RolController::class, 'create'])->name('rol.create');
Route::post('/rol/store', [App\Http\Controllers\RolController::class, 'store'])->name('rol.store');

//Rutas Para Alergia
Route::get('/alergia', [App\Http\Controllers\AlergiaController::class, 'index'])->name('alergia');
Route::get('/alergia/{id}', [App\Http\Controllers\AlergiaController::class, 'show'])->name('alergia.show');
Route::get('/alergia/create', [App\Http\Controllers\AlergiaController::class, 'create'])->name('alergia.create');
Route::post('/alergia/store', [App\Http\Controllers\AlergiaController::class, 'store'])->name('alergia.store');
Route::post('/alergia/crear', [App\Http\Controllers\AlergiaController::class, 'crear'])->name('alergia.crear');
Route::post('/alergia/editar', [App\Http\Controllers\AlergiaController::class, 'editar'])->name('alergia.editar');
Route::post('/alergia/eliminar', [App\Http\Controllers\AlergiaController::class, 'eliminar'])->name('alergia.eliminar');
Route::get('/alergia/edit/{id}', [App\Http\Controllers\AlergiaController::class, 'edit'])->name('alergia.edit');
Route::put('/alergia/{id}', [App\Http\Controllers\AlergiaController::class, 'update'])->name('alergia.update');
Route::delete('/alergia/{id}', [App\Http\Controllers\AlergiaController::class, 'destroy'])->name('alergia.destroy');

//Rutas Para Metodo Anticonceptivo
Route::get('/manticonceotivo', [App\Http\Controllers\ManticonceotivoController::class, 'index'])->name('manticonceotivo');
Route::get('/manticonceotivo/{id}', [App\Http\Controllers\ManticonceotivoController::class, 'show'])->name('manticonceotivo.show');
Route::get('/manticonceotivo/create', [App\Http\Controllers\ManticonceotivoController::class, 'create'])->name('manticonceotivo.create');
Route::post('/manticonceotivo/store', [App\Http\Controllers\ManticonceotivoController::class, 'store'])->name('manticonceotivo.store');
Route::post('/manticonceptivo/crear', [App\Http\Controllers\ManticonceotivoController::class, 'crear'])->name('manticonceptivo.crear');
Route::post('/manticonceptivo/editar', [App\Http\Controllers\ManticonceotivoController::class, 'editar'])->name('manticonceptivo.editar');
Route::post('/manticonceptivo/eliminar', [App\Http\Controllers\ManticonceotivoController::class, 'eliminar'])->name('manticonceptivo.eliminar');
Route::get('/manticonceotivo/edit/{id}', [App\Http\Controllers\ManticonceotivoController::class, 'edit'])->name('manticonceotivo.edit');
Route::put('/manticonceotivo/{id}', [App\Http\Controllers\ManticonceotivoController::class, 'update'])->name('manticonceotivo.update');
Route::delete('/manticonceotivo/{id}', [App\Http\Controllers\ManticonceotivoController::class, 'destroy'])->name('manticonceotivo.destroy');

//Rutas Para Sed
Route::get('/sed', [App\Http\Controllers\SedController::class, 'index'])->name('sed');
Route::get('/sed/{id}', [App\Http\Controllers\SedController::class, 'show'])->name('sed.show');
Route::get('/sed/create', [App\Http\Controllers\SedController::class, 'create'])->name('sed.create');
Route::post('/sed/store', [App\Http\Controllers\SedController::class, 'store'])->name('sed.store');
Route::post('/sed/crear', [App\Http\Controllers\SedController::class, 'crear'])->name('sed.crear');
Route::post('/sed/editar', [App\Http\Controllers\SedController::class, 'editar'])->name('sed.editar');
Route::post('/sed/eliminar', [App\Http\Controllers\SedController::class, 'eliminar'])->name('sed.eliminar');
Route::get('/sed/edit/{id}', [App\Http\Controllers\SedController::class, 'edit'])->name('sed.edit');
Route::put('/sed/{id}', [App\Http\Controllers\SedController::class, 'update'])->name('sed.update');
Route::delete('/sed/{id}', [App\Http\Controllers\SedController::class, 'destroy'])->name('sed.destroy');

//Rutas Para Apetito
Route::get('/apetito', [App\Http\Controllers\ApetitoController::class, 'index'])->name('apetito');
Route::get('/apetito/{id}', [App\Http\Controllers\ApetitoController::class, 'show'])->name('apetito.show');
Route::get('/apetito/create', [App\Http\Controllers\ApetitoController::class, 'create'])->name('apetito.create');
Route::post('/apetito/store', [App\Http\Controllers\ApetitoController::class, 'store'])->name('apetito.store');
Route::post('/apetito/crear', [App\Http\Controllers\ApetitoController::class, 'crear'])->name('apetito.crear');
Route::post('/apetito/editar', [App\Http\Controllers\ApetitoController::class, 'editar'])->name('apetito.editar');
Route::post('/apetito/eliminar', [App\Http\Controllers\ApetitoController::class, 'eliminar'])->name('apetito.eliminar');
Route::get('/apetito/edit/{id}', [App\Http\Controllers\ApetitoController::class, 'edit'])->name('apetito.edit');
Route::put('/apetito/{id}', [App\Http\Controllers\ApetitoController::class, 'update'])->name('apetito.update');
Route::delete('/apetito/{id}', [App\Http\Controllers\ApetitoController::class, 'destroy'])->name('apetito.destroy');

//Rutas Para Deposicion
Route::get('/deposicion', [App\Http\Controllers\DeposicionController::class, 'index'])->name('deposicion');
Route::get('/deposicion/{id}', [App\Http\Controllers\DeposicionController::class, 'show'])->name('deposicion.show');
Route::get('/deposicion/create', [App\Http\Controllers\DeposicionController::class, 'create'])->name('deposicion.create');
Route::post('/deposicion/store', [App\Http\Controllers\DeposicionController::class, 'store'])->name('deposicion.store');
Route::post('/deposicion/crear', [App\Http\Controllers\DeposicionController::class, 'crear'])->name('deposicion.crear');
Route::post('/deposicion/editar', [App\Http\Controllers\DeposicionController::class, 'editar'])->name('deposicion.editar');
Route::post('/deposicion/eliminar', [App\Http\Controllers\DeposicionController::class, 'eliminar'])->name('deposicion.eliminar');
Route::get('/deposicion/edit/{id}', [App\Http\Controllers\DeposicionController::class, 'edit'])->name('deposicion.edit');
Route::put('/deposicion/{id}', [App\Http\Controllers\DeposicionController::class, 'update'])->name('deposicion.update');
Route::delete('/deposicion/{id}', [App\Http\Controllers\DeposicionController::class, 'destroy'])->name('deposicion.destroy');

//Rutas Para Sueño
Route::get('/sueño', [App\Http\Controllers\SuenioController::class, 'index'])->name('sueño');
Route::get('/sueño/{id}', [App\Http\Controllers\SuenioController::class, 'show'])->name('sueño.show');
Route::get('/sueño/create', [App\Http\Controllers\SuenioController::class, 'create'])->name('sueño.create');
Route::post('/sueño/store', [App\Http\Controllers\SuenioController::class, 'store'])->name('sueño.store');
Route::post('/sueño/crear', [App\Http\Controllers\SuenioController::class, 'crear'])->name('sueño.crear');
Route::post('/sueño/editar', [App\Http\Controllers\SuenioController::class, 'editar'])->name('sueño.editar');
Route::post('/sueño/eliminar', [App\Http\Controllers\SuenioController::class, 'eliminar'])->name('sueño.eliminar');
Route::get('/sueño/edit/{id}', [App\Http\Controllers\SuenioController::class, 'edit'])->name('sueño.edit');
Route::put('/sueño/{id}', [App\Http\Controllers\SuenioController::class, 'update'])->name('sueño.update');
Route::delete('/sueño/{id}', [App\Http\Controllers\SuenioController::class, 'destroy'])->name('sueño.destroy');

//Rutas Para Orina
Route::get('/orina', [App\Http\Controllers\OrinaController::class, 'index'])->name('orina');
Route::get('/orina/{id}', [App\Http\Controllers\OrinaController::class, 'show'])->name('orina.show');
Route::get('/orina/create', [App\Http\Controllers\OrinaController::class, 'create'])->name('orina.create');
Route::post('/orina/store', [App\Http\Controllers\OrinaController::class, 'store'])->name('orina.store');
Route::post('/orina/crear', [App\Http\Controllers\OrinaController::class, 'crear'])->name('orina.crear');
Route::post('/orina/editar', [App\Http\Controllers\OrinaController::class, 'editar'])->name('orina.editar');
Route::post('/orina/eliminar', [App\Http\Controllers\OrinaController::class, 'eliminar'])->name('orina.eliminar');
Route::get('/orina/edit/{id}', [App\Http\Controllers\OrinaController::class, 'edit'])->name('orina.edit');
Route::put('/orina/{id}', [App\Http\Controllers\OrinaController::class, 'update'])->name('orina.update');
Route::delete('/orina/{id}', [App\Http\Controllers\OrinaController::class, 'destroy'])->name('orina.destroy');

//Rutas Para Pulso
Route::get('/pulso', [App\Http\Controllers\PulsoController::class, 'index'])->name('pulso');
Route::get('/pulso/{id}', [App\Http\Controllers\PulsoController::class, 'show'])->name('pulso.show');
Route::get('/pulso/create', [App\Http\Controllers\PulsoController::class, 'create'])->name('pulso.create');
Route::post('/pulso/store', [App\Http\Controllers\PulsoController::class, 'store'])->name('pulso.store');
Route::get('/pulso/edit/{id}', [App\Http\Controllers\PulsoController::class, 'edit'])->name('pulso.edit');
Route::put('/pulso/{id}', [App\Http\Controllers\PulsoController::class, 'update'])->name('pulso.update');
Route::delete('/pulso/{id}', [App\Http\Controllers\PulsoController::class, 'destroy'])->name('pulso.destroy');

//Rutas Para Temperatura
Route::get('/temperatura', [App\Http\Controllers\TemperaturaController::class, 'index'])->name('temperatura');
Route::get('/temperatura/{id}', [App\Http\Controllers\TemperaturaController::class, 'show'])->name('temperatura.show');
Route::get('/temperatura/create', [App\Http\Controllers\TemperaturaController::class, 'create'])->name('temperatura.create');
Route::post('/temperatura/store', [App\Http\Controllers\TemperaturaController::class, 'store'])->name('temperatura.store');
Route::get('/temperatura/edit/{id}', [App\Http\Controllers\TemperaturaController::class, 'edit'])->name('temperatura.edit');
Route::put('/temperatura/{id}', [App\Http\Controllers\TemperaturaController::class, 'update'])->name('temperatura.update');
Route::delete('/temperatura/{id}', [App\Http\Controllers\TemperaturaController::class, 'destroy'])->name('temperatura.destroy');

//Rutas Para Presion Arterial
Route::get('/presarterial', [App\Http\Controllers\PresarterialController::class, 'index'])->name('presarterial');
Route::get('/presarterial/{id}', [App\Http\Controllers\PresarterialController::class, 'show'])->name('presarterial.show');
Route::get('/presarterial/create', [App\Http\Controllers\PresarterialController::class, 'create'])->name('presarterial.create');
Route::post('/presarterial/store', [App\Http\Controllers\PresarterialController::class, 'store'])->name('presarterial.store');
Route::get('/presarterial/edit/{id}', [App\Http\Controllers\PresarterialController::class, 'edit'])->name('presarterial.edit');
Route::put('/presarterial/{id}', [App\Http\Controllers\PresarterialController::class, 'update'])->name('presarterial.update');
Route::delete('/presarterial/{id}', [App\Http\Controllers\PresarterialController::class, 'destroy'])->name('presarterial.destroy');

//Rutas Para Talla
Route::get('/talla', [App\Http\Controllers\TallaController::class, 'index'])->name('talla');
Route::get('/talla/{id}', [App\Http\Controllers\TallaController::class, 'show'])->name('talla.show');
Route::get('/talla/create', [App\Http\Controllers\TallaController::class, 'create'])->name('talla.create');
Route::post('/talla/store', [App\Http\Controllers\TallaController::class, 'store'])->name('talla.store');
Route::get('/talla/edit/{id}', [App\Http\Controllers\TallaController::class, 'edit'])->name('talla.edit');
Route::put('/talla/{id}', [App\Http\Controllers\TallaController::class, 'update'])->name('talla.update');
Route::delete('/talla/{id}', [App\Http\Controllers\TallaController::class, 'destroy'])->name('talla.destroy');

//Rutas Para Peso
Route::get('/peso', [App\Http\Controllers\PesoController::class, 'index'])->name('peso');
Route::get('/peso/{id}', [App\Http\Controllers\PesoController::class, 'show'])->name('peso.show');
Route::get('/peso/create', [App\Http\Controllers\PesoController::class, 'create'])->name('peso.create');
Route::post('/peso/store', [App\Http\Controllers\PesoController::class, 'store'])->name('peso.store');
Route::get('/peso/edit/{id}', [App\Http\Controllers\PesoController::class, 'edit'])->name('peso.edit');
Route::put('/peso/{id}', [App\Http\Controllers\PesoController::class, 'update'])->name('peso.update');
Route::delete('/peso/{id}', [App\Http\Controllers\PesoController::class, 'destroy'])->name('peso.destroy');

//Rutas Para triaje
Route::get('/triaje', [App\Http\Controllers\TriajeController::class, 'index'])->name('triaje');
Route::get('/triaje/show', [App\Http\Controllers\TriajeController::class, 'show'])->name('triaje.show');
Route::get('/triaje/create', [App\Http\Controllers\TriajeController::class, 'create'])->name('triaje.create');
Route::post('/triaje/store', [App\Http\Controllers\TriajeController::class, 'store'])->name('triaje.store');
Route::get('/triaje/edit/{id}', [App\Http\Controllers\TriajeController::class, 'edit'])->name('triaje.edit');
Route::post('/triaje/guardar', [App\Http\Controllers\TriajeController::class, 'update'])->name('triaje.guardar');
Route::delete('/triaje/{id}', [App\Http\Controllers\TriajeController::class, 'destroy'])->name('triaje.destroy');
Route::get('/triaje/{id}', [App\Http\Controllers\TriajeController::class, 'ver'])->name('triaje.ver');
Route::get('/triaje/resultadopdf/{id}', [App\Http\Controllers\TriajeController::class, 'resultadosPDF'])->name('triaje.resultadopdf');
Route::get('triaje/inicio/{id}', [App\Http\Controllers\TriajeController::class, 'index'])->name('triaje.inicio');
Route::post('/triajeTemporal', [App\Http\Controllers\TriajeController::class, 'triajeTemporal'])->name('triajeTemporal');

//Rutas Para Consulta 
//Route::get('/consulta', 'ConsultaController@index')->name('consulta');
Route::get('/consulta/ver', [App\Http\Controllers\ConsultaController::class, 'ver'])->name('consulta.ver');
Route::get('/consultaDetalle/{id}', [App\Http\Controllers\ConsultaController::class, 'detalle'])->name('consultaDetalle');
Route::post('/consulta/{id}', [App\Http\Controllers\ConsultaController::class, 'show'])->name('consulta.show'); 
Route::get('/consulta/create', [App\Http\Controllers\ConsultaController::class, 'create'])->name('consulta.create');
Route::post('store', [App\Http\Controllers\ConsultaController::class, 'store'])->name('consulta.store');
Route::post('mantener', [App\Http\Controllers\ConsultaController::class, 'mantener'])->name('consulta.mantener');
Route::get('/consulta/edit/{id}', [App\Http\Controllers\ConsultaController::class, 'edit'])->name('consuluta.edit');
Route::put('/consulta/{id}', [App\Http\Controllers\ConsultaController::class, 'update'])->name('consulta.pdate');
Route::delete('/consulta/{id}', [App\Http\Controllers\ConsultaController::class, 'destroy'])->name('consulta.destroy');
Route::post('/consultaexamen/store', [App\Http\Controllers\ConsultaexamenController::class, 'store'])->name('consultaexamen.store');
Route::get('/descargar/{file}' , [App\Http\Controllers\ConsultaController::class, 'descarga']);
Route::post('/diagnosticoDelete', [App\Http\Controllers\DiagnosticoCiesController::class, 'eliminar'])->name('diagnostico.delete');
Route::post('/consultaorden/store', [App\Http\Controllers\ConsultaexamenController::class, 'store'])->name('consultaorden.store');
Route::post('/tratamientoDelete', [App\Http\Controllers\TratamientoController::class, 'eliminar'])->name('tratamiento.delete');
Route::post('/observacionDelete', [App\Http\Controllers\ObservacionController::class, 'eliminar'])->name('observacion.delete');


//Route::post('/consul/store', 'ConsulController@store')->name('consulta.store');
Route::post('consultaa/buscardiagnostico', [App\Http\Controllers\ConsultaController::class, 'buscardiagnostico']);
Route::get('consulta-list-pdf', [App\Http\Controllers\ConsultaController::class, 'exportPDF'])->name('consulta.pdf');
Route::get('consulta/inicio/{id}', [App\Http\Controllers\ConsultaController::class, 'index'])->name('consulta.inicio'); 
Route::post('buscarDiagnostico', [App\Http\Controllers\ConsultaController::class, 'diagnostico'])->name('buscarDiagnostico');
Route::post('buscarDiagDetCie', [App\Http\Controllers\ConsultaController::class, 'buscarDiagDetCie'])->name('buscarDiagDetCie');
Route::post('diagnosticoCies', [App\Http\Controllers\ConsultaController::class, 'ConCie'])->name('diagnosticoCies'); 
Route::post('buscardiagnosticocie', [App\Http\Controllers\ConsultaController::class, 'buscardiagnosticocie'])->name('consultas.diagdetcie');
Route::post('examexterno', [App\Http\Controllers\ConsultaController::class, 'examexterno'])->name('consulta.examexterno');
//Route::get('recetamedica/{id}', 'ConsultaController@recetaPDF')->name('receta');
Route::get('consulta/inicio/ordenExterno/{id}', [App\Http\Controllers\ConsultaController::class, 'ordenPDF'])->name('orden');
//Route::post('/consulta/guardar', 'ConsultaController@guardar')->name('consulta.guardar');

//Rutas Para Examen Ginecológico
//Route::get('/examenginecologico/{id}', 'ExamenginecologicoController@index')->name('examenginecologico');
Route::get('/examenginecologico/{id}', [App\Http\Controllers\ExamenginecologicoController::class, 'show'])->name('examenginecologico.show');
Route::get('/examenginecologico/create', [App\Http\Controllers\ExamenginecologicoController::class, 'create'])->name('examenginecologico.create');
Route::post('/examenginecologico/store', [App\Http\Controllers\ExamenginecologicoController::class, 'store'])->name('examenginecologico.store'); 
Route::get('/examenginecologico/edit/{id}', [App\Http\Controllers\ExamenginecologicoController::class, 'edit'])->name('examenginecologico.edit');
Route::put('/examenginecologico/{id}', [App\Http\Controllers\ExamenginecologicoController::class, 'update'])->name('examenginecologico.update');
Route::delete('/examenginecologico/{id}', [App\Http\Controllers\ExamenginecologicoController::class, 'destroy'])->name('examenginecologico.destroy');
Route::get('/examenginecologico/resultadopdf/{id}', [App\Http\Controllers\ExamenginecologicoController::class, 'resultadosPDF'])->name('examenginecologico.resultadopdf');
Route::post('/examenginecologico/guardar', [App\Http\Controllers\ExamenginecologicoController::class, 'guardar'])->name('guardExamGineco');
//Route::post('guardarExam', 'ExamenginecologicoController@Guardar')->name('guardarExam');


//RUtas para usuarios
Route::resource('usuario', [App\Http\Controllers\UsersController::class, 'index']); 
Route::get('/usuario/{id}', [App\Http\Controllers\UsersController::class, 'show'])->name('perfil');
//Route::post('/usuario/store', 'UsersController@store')->name('usuario.store');

//Rutas de Diagnosticos y Cies


//Rutas Para Tratamiento
Route::get('/tratamiento', [App\Http\Controllers\TratamientoController::class, 'index'])->name('tratamiento');
Route::get('/tratamiento/{id}', [App\Http\Controllers\TratamientoController::class, 'show'])->name('tratamiento.show');
Route::get('/tratamiento/create', [App\Http\Controllers\TratamientoController::class, 'create'])->name('tratamiento.create');
Route::post('/tratamiento/store', [App\Http\Controllers\TratamientoController::class, 'store'])->name('tratamiento.store');
Route::get('/tratamiento/edit/{id}', [App\Http\Controllers\TratamientoController::class, 'edit'])->name('tratamiento.edit');
Route::put('/tratamiento/{id}', [App\Http\Controllers\TratamientoController::class, 'update'])->name('tratamiento.update');
Route::delete('/tratamiento/{id}', [App\Http\Controllers\TratamientoController::class, 'destroy'])->name('tratamiento.destroy');
Route::get('/tratamiento/recetapdf/{id}', [App\Http\Controllers\TratamientoController::class, 'recetaPDF'])->name('tratamiento.recetapdf');

//Rutas Para Observacion
Route::get('/observacion', [App\Http\Controllers\ObservacionController::class, 'index'])->name('observacion');
Route::get('/observacion/{id}', [App\Http\Controllers\ObservacionController::class, 'show'])->name('observacion.show');
Route::get('/observacion/create', [App\Http\Controllers\ObservacionController::class, 'create'])->name('observacion.create');
Route::post('/observacion/store', [App\Http\Controllers\ObservacionController::class, 'store'])->name('observacion.store');
Route::get('/observacion/edit/{id}', [App\Http\Controllers\ObservacionController::class, 'edit'])->name('observacion.edit');
Route::put('/observacion/{id}', [App\Http\Controllers\ObservacionController::class, 'update'])->name('observacion.update'); 
Route::delete('/observacion/{id}', [App\Http\Controllers\ObservacionController::class, 'destroy'])->name('observacion.destroy');

//Rutas Para Observacion
Route::get('/acompanante', [App\Http\Controllers\AcompananteController::class, 'index'])->name('acompanante');
Route::get('/acompanante/{id}', [App\Http\Controllers\AcompananteController::class, 'show'])->name('acompanante.show');
Route::get('/acompanante/create', [App\Http\Controllers\AcompananteController::class, 'create'])->name('acompanante.create');
Route::post('/acompanante/guardar', [App\Http\Controllers\AcompananteController::class, 'guardar'])->name('acompanante.guardar');
Route::get('/acompanante/edit/{id}', [App\Http\Controllers\AcompananteController::class, 'edit'])->name('acompanante.edit');
Route::put('/acompanante/{id}', [App\Http\Controllers\AcompananteController::class, 'update'])->name('acompanante.update');
Route::delete('/acompanante/{id}', [App\Http\Controllers\AcompananteController::class, 'destroy'])->name('acompanante.destroy');
Route::post('/acompanante/store', [App\Http\Controllers\AcompananteController::class, 'store'])->name('acompanante.store');

Route::get('/guardar', [App\Http\Controllers\AcompananteController::class, 'guardar'])->name('guardar');

//Rutas Para Observacion
Route::get('/orden', [App\Http\Controllers\OrdenController::class, 'index'])->name('orden');
Route::get('/orden/{id}', [App\Http\Controllers\OrdenController::class, 'show'])->name('orden.show');
Route::get('/orden/create', [App\Http\Controllers\OrdenController::class, 'create'])->name('orden.create');
Route::post('/orden/store', [App\Http\Controllers\OrdenController::class, 'store'])->name('orden.store');
Route::get('/orden/edit/{id}', [App\Http\Controllers\OrdenController::class, 'edit'])->name('orden.edit');
Route::put('/orden/{id}', [App\Http\Controllers\OrdenController::class, 'update'])->name('orden.update');
Route::delete('/orden/{id}', [App\Http\Controllers\OrdenController::class, 'destroy'])->name('orden.destroy');
Route::get('emitir-orden-pdf/{id}', [App\Http\Controllers\OrdenController::class, 'emitirPDF'])->name('emitirorden.pdf');

Route::post('/laboratorio/store', [App\Http\Controllers\LaboratorioController::class, 'store'])->name('laboratorio.store');

Route::get('listado_graficas', [App\Http\Controllers\GraficasController::class, 'index'])->name('cantidadCitas');
Route::get('grafica_registros/{anio}/{mes}', [App\Http\Controllers\GraficasController::class, 'registros_mes']);
Route::get('grafica_tipoCita', [App\Http\Controllers\GraficasController::class, 'tipo_cita']);
Route::get('grafica_registrosTriaje/{anio}/{mes}', [App\Http\Controllers\GraficasController::class, 'registros_mesTriaje']);
Route::get('grafica_registrosConsulta/{anio}/{mes}', [App\Http\Controllers\GraficasController::class, 'registros_mesConsulta']);
//Route::get('cantidadTriaje', 'GraficasController@triaje')->name('cantidadTriaje');
Route::get('listado_graficas_triaje', [App\Http\Controllers\GraficasController::class, 'triaje'])->name('cantidadTriaje');
Route::get('listado_graficas_consultas', [App\Http\Controllers\GraficasController::class, 'consulta'])->name('cantidadConsulta'); 

//Rutas Para Laboratorio
Route::post('/laboratorio/crear', [App\Http\Controllers\LaboratorioController::class, 'crear'])->name('laboratorio.crear');
Route::post('/laboratorio/editar', [App\Http\Controllers\LaboratorioController::class, 'editar'])->name('laboratorio.editar');
Route::post('/laboratorio/eliminar', [App\Http\Controllers\LaboratorioController::class, 'eliminar'])->name('laboratorio.eliminar');

Route::get('historiaClinica/{id}', [App\Http\Controllers\PacienteController::class, 'historiaClinica'])->name('historiaClinica');
Route::get('recetamedica/{id}', [App\Http\Controllers\PacienteController::class, 'receta'])->name('receta');
Route::get('ticketCita/{id}', [App\Http\Controllers\CitaController::class, 'ticket'])->name('ticketCita');
Route::get('ticketOrdenExamen/{id}', [App\Http\Controllers\OrdenController::class, 'ticket'])->name('ticketOrdenExamen');
Route::get('facebook', [App\Http\Controllers\PacienteController::class, 'facebook'])->name('facebook'); 

Route::post('subirOrdenExamen', [App\Http\Controllers\ConsultaexamenController::class, 'subirOrdenExamen'])->name('subirOrdenExamen');
Route::post('/examenginecologico/guardar', [App\Http\Controllers\ExamenginecologicoController::class, 'guardar'])->name('subirExamenAuxiliar');
Route::post('/subirExamenAuxiliarMotConsul', [App\Http\Controllers\ExamenginecologicoController::class, 'GuardarMotConsul'])->name('subirExamenAuxiliarMotConsul');
Route::get('/downloadOrden/{id}' , [App\Http\Controllers\ConsultaexamenController::class, 'downloadFile'])->name('downloadOrdenExamen');
Route::get('/downloadExamAux/{id}' , [App\Http\Controllers\ConsultaexamenController::class, 'downloadFileExam'])->name('downloadExamenAuxiliar');
Route::post('/subirExamenAuxiliars', [App\Http\Controllers\ConsultaexamenController::class, 'subirExamenAuxiliars'])->name('subirExamenAuxiliars');

Route::get('/verExam/{id}' , [App\Http\Controllers\ConsultaexamenController::class, 'verExam'])->name('verExam');

Route::post('/medicamento/crear', [App\Http\Controllers\MedicamentoController::class, 'crear'])->name('medicamento.crear');
Route::post('/medicamento/editar', [App\Http\Controllers\MedicamentoController::class, 'editar'])->name('medicamento.editar');
Route::post('/medicamento/eliminar', [App\Http\Controllers\MedicamentoController::class, 'eliminar'])->name('medicamento.eliminar');

Route::post('/cie/crear', [App\Http\Controllers\CieController::class, 'crear'])->name('cie.crear');
Route::post('/cie/editar', [App\Http\Controllers\CieController::class, 'editar'])->name('cie.editar');
Route::post('/cie/eliminar', [App\Http\Controllers\CieController::class, 'eliminar'])->name('cie.eliminar');

Route::post('/filtrarConsultas', [App\Http\Controllers\ConsultaController::class, 'filtrado'])->name('filtradoConsulta');
