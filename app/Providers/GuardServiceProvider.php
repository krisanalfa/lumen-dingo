<?php

namespace App\Providers;

use App\Auth\ApiGuard;
use Illuminate\Support\ServiceProvider;

class GuardServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('auth')->extend('api', function($app, $name, array $config) {
            return new ApiGuard(
                $app->make('auth')->createUserProvider($config['provider']),
                $app->make('request')
            );
        });
    }
}
