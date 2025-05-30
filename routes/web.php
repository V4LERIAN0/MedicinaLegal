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
    ProfileController,
    UsuarioSistemaController
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

    Route::middleware('permission:cargo.read|cargo.create|cargo.update|cargo.delete')
    ->resource('cargo', CargoController::class);

Route::middleware('permission:personal.read|personal.create|personal.update|personal.delete')
    ->resource('personal', PersonalController::class);

Route::middleware('permission:causamuerte.read|causamuerte.create|causamuerte.update|causamuerte.delete')
    ->resource('causamuerte', CausaMuerteController::class);

Route::middleware('permission:sala.read|sala.create|sala.update|sala.delete')
    ->resource('sala', SalaController::class);

Route::middleware('permission:fallecido.read|fallecido.create|fallecido.update|fallecido.delete')
    ->resource('fallecido', FallecidoController::class);

Route::middleware('permission:autopsia.read|autopsia.create|autopsia.update|autopsia.delete')
    ->resource('autopsia', AutopsiaController::class)->parameters(['autopsia' => 'autopsia']);

Route::middleware('permission:informe.read|informe.create|informe.update|informe.delete')
    ->resource('informe', InformeController::class)
    ->parameters(['informe' => 'informe']);


Route::middleware('permission:evidencia.read|evidencia.create|evidencia.update|evidencia.delete')
    ->resource('evidencia', EvidenciaController::class)
    ->parameters(['evidencia' => 'evidencia']);   


Route::middleware('permission:familiar.read|familiar.create|familiar.update|familiar.delete')
    ->resource('familiar', FamiliarController::class);

Route::middleware('permission:traslado.read|traslado.create|traslado.update|traslado.delete')
    ->resource('traslado', TrasladoController::class)
    ->parameters(['traslado' => 'traslado']);
    
Route::middleware(['auth', 'permission:registro_fotografico.read|registro_fotografico.create|registro_fotografico.update|registro_fotografico.delete'])
    ->resource('registro_fotografico', RegistroFotograficoController::class);

Route::middleware('permission:toxico_detectado.read|toxico_detectado.create|toxico_detectado.update|toxico_detectado.delete')
      ->resource('toxico_detectado', ToxicoDetectadoController::class)
      ->parameters(['toxico_detectado' => 'toxico_detectado']);   // pin parameter

Route::middleware('permission:cadena_custodia.read|cadena_custodia.create|cadena_custodia.update|cadena_custodia.delete')
    ->resource('custodia', CadenaCustodiaController::class)
    ->parameters(['custodia' => 'custodia']);          // pin {custodia}

Route::middleware('permission:usuario_sistema.read|usuario_sistema.create|usuario_sistema.update|usuario_sistema.delete')
      ->resource('usuario', UsuarioSistemaController::class)
      ->parameters(['usuario' => 'usuario']);

});

require __DIR__.'/auth.php';
