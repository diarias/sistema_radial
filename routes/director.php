<?php

use App\Http\Controllers\Backend\CalendarioCoberturaController;
use App\Http\Controllers\Backend\CalendarioEntrevistaController;
use App\Http\Controllers\Backend\CalendarioMencionesController;
use App\Http\Controllers\Backend\CalendarioPromocionController;
use App\Http\Controllers\Backend\CoberturaController;
use App\Http\Controllers\Backend\DirectorController;
use App\Http\Controllers\Backend\EntrevistaController;
use App\Http\Controllers\Backend\InicioController;
use App\Http\Controllers\Backend\MencionController;
use App\Http\Controllers\Backend\PerfilController;
use App\Http\Controllers\Backend\ProgramaController;
use App\Http\Controllers\Backend\ProgramaMencionController;
use App\Http\Controllers\Backend\ProgramaPromocionesController;
use App\Http\Controllers\Backend\ProgramaUsuarioController;
use App\Http\Controllers\Backend\PromocionController;
use App\Http\Controllers\Backend\UsuarioCoberturaController;
use App\Http\Controllers\Backend\UsuarioController;
use App\Http\Controllers\Backend\UsuarioProgramaController;
use App\Models\CalendarioMenciones;
use Illuminate\Support\Facades\Route;

 Route::get('panel', [DirectorController::class, 'panel'])->name('panel');

/*Rutas del perfil */

Route::get('perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('perfil/update', [PerfilController::class, 'updatePerfil'])->name('perfil.update');

Route::post('perfil/update/password', [PerfilController::class, 'updatePassword'])->name('password.update');

Route::resource('entrevistas', EntrevistaController::class);
Route::resource('programa', ProgramaController::class);
Route::resource('promociones', PromocionController::class);
Route::resource('programa-promocion', ProgramaPromocionesController::class);
Route::resource('menciones', MencionController::class);
Route::resource('programa-mencion', ProgramaMencionController::class);
Route::resource('coberturas', CoberturaController::class);
Route::resource('usuario-cobertura', UsuarioCoberturaController::class);

Route::resource('usuario', UsuarioController::class);

Route::resource('usuario-programa', UsuarioProgramaController::class);

/*Rutas de Calendarios*/
Route::get('calendario-entrevistas', [CalendarioEntrevistaController::class, 'entrevistas'])->name('calendario.entrevistas');
//Route::resource('calendario-entrevistas', [CalendarioEntrevistaController::class]);
Route::resource('calendario-promociones', CalendarioPromocionController::class );
Route::resource('calendario-menciones', CalendarioMencionesController::class );
Route::resource('calendario-coberturas', CalendarioCoberturaController::class );

/* inicio*/
Route::get('panel', [InicioController::class, 'index'])->name('panel');
/* Programa Usuario */

Route::resource('programa-usuario', ProgramaUsuarioController::class);


Route::get('entrevistas/{id}/activar-inactivar', [ CalendarioEntrevistaController::class, 'activarInactivarEntrevista'])->name('calendario.entrevistas.activar-inactivar');

?>