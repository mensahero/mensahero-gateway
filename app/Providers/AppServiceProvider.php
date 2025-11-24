<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Override;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {

        Str::macro('possessive', function (string $string): ?string {
            if (empty($string)) {
                return null;
            }

            return Str::endsWith($string, 's') ? $string."'" : $string."'s";
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
