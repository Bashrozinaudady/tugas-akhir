<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DocnumberProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path(). '/Helpers/Docnumber.php';
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
