<?php

namespace Bijoy\Math;

use Illuminate\Support\ServiceProvider;

class MathServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('math', function ($app) {
            return new \Bijoy\Math\Math();
        });
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../views', 'math');

        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/math'),
        ], 'math-views');
    }
}
