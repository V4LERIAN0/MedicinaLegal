<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CargoController,
    PersonalController,
    CausaMuerteController,
    SalaController,
    FallecidoController,
    AutopsiaController,
    InformeController,
    EvidenciaController,
    FamiliarController,
    TrasladoController,
    RegistroFotograficoController,
    ToxicoDetectadoController,
    CadenaCustodiaController,
    ProfileController
};

/* ---------- públicas ---------- */
Route::get('/', fn () => view('welcome'));

/* ---------- dashboard Breeze ---------- */
Route::middleware(['auth','verified'])
    ->get('/dashboard', fn () => view('dashboard'))
    ->name('dashboard');

/* ---------- perfil Breeze ---------- */
Route::middleware('auth')->group(function () {
    Route::get   ('/profile',  [ProfileController::class, 'edit'   ])->name('profile.edit');
    Route::patch ('/profile',  [ProfileController::class, 'update' ])->name('profile.update');
    Route::delete('/profile',  [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* ---------- TODOS los CRUD protegidos por permisos ---------- */
Route::middleware('auth')->group(function () {

    Route::middleware('permission:cargo.*')
        ->resource('cargo', CargoController::class);

    Route::middleware('permission:personal.*')
        ->resource('personal', PersonalController::class);

    Route::middleware('permission:causamuerte.*')
        ->resource('causamuerte', CausaMuerteController::class);

    Route::middleware('permission:sala.*')
        ->resource('sala', SalaController::class);

    Route::middleware('permission:fallecido.*')
        ->resource('fallecido', FallecidoController::class);

    Route::middleware('permission:autopsia.*')
        ->resource('autopsia', AutopsiaController::class);

    Route::middleware('permission:informe.*')
        ->resource('informe', InformeController::class);

    Route::middleware('permission:evidencia.*')
        ->resource('evidencia', EvidenciaController::class);

    Route::middleware('permission:familiar.*')
        ->resource('familiar', FamiliarController::class);

    Route::middleware('permission:traslado.*')
        ->resource('traslado', TrasladoController::class);

    Route::middleware('permission:registro_fotografico.*')
        ->resource('registro_fotografico', RegistroFotograficoController::class);

    Route::middleware('permission:toxico_detectado.*')
        ->resource('toxico_detectado', ToxicoDetectadoController::class);

    Route::middleware('permission:cadena_custodia.*')
        ->resource('cadena_custodia', CadenaCustodiaController::class);

});

require __DIR__.'/auth.php';
