<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CausaMuerteController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\FallecidoController;
use App\Http\Controllers\AutopsiaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\CadenaCustodiaController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\TrasladoController;
use App\Http\Controllers\RegistroFotograficoController;
use App\Http\Controllers\ToxicoDetectadoController;
use App\Http\Controllers\UsuarioSistemaController;

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

Route::resources([
    'cargo'               => CargoController::class,
    'personal'            => PersonalController::class,
    'causamuerte'         => CausaMuerteController::class,
    'sala'                => SalaController::class,
    'fallecido'           => FallecidoController::class,
    'autopsia'            => AutopsiaController::class,
    'informe'             => InformeController::class,
    'evidencia'           => EvidenciaController::class,
    'cadenacustodia'      => CadenaCustodiaController::class,
    'familiar'            => FamiliarController::class,
    'traslado'            => TrasladoController::class,
    'registrofotografico' => RegistroFotograficoController::class,
    'toxicodetectado'     => ToxicoDetectadoController::class,
    'usuariosistema'      => UsuarioSistemaController::class,
]);

