<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyCustomizationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Fortify::username('username'); // ← línea clave
    }
}
