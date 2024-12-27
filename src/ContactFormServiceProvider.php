<?php

namespace laracontact\contactform;

use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {  
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/contactform'),
        ], 'public');
        $this->publishes([
            __DIR__.'/../config/config.php' =>config_path('contactform.php')
            ], 'contactform-config');
        $this->LoadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->LoadViewsFrom(__DIR__.'/../resources/views','contactform');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
