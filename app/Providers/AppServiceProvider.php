<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Laravel Passport configuration
         */

        // Define the path where Laravel Passport's keys should be loaded from
        Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');

        // Hash client secrets before storing them in the database
        Passport::hashClientSecrets();

        // Configure how long each token type lasts after it's generated
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
