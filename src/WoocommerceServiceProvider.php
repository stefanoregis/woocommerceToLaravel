<?php

namespace stefanoregis\woocommerceToLaravel;

use Illuminate\Support\ServiceProvider;

class WoocommerceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->publishes([
            __DIR__.'/../config/woocommerce_to_laravel.php' => config_path('woocommerce_to_laravel.php'),
        ], 'woocommerce-to-laravel-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/woocommerce_to_laravel.php',
            'woocommerce_to_laravel'
        );
    }
}

?>