<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Participant area theme path
         */
        \View::addNamespace('participant', resource_path('views/participant'));

        /**
         * Theme path
         */
        \View::addNamespace('themes', resource_path('views/themes'));

        /**
         * Public Entity active theme
         */
        \View::addNamespace('public_entity', resource_path('views/themes/mottestate'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
