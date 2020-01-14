<?php

namespace stefanoregis\woocommercetolaravel;

use Illuminate\Foundation\AliasLoader;

use Illuminate\Support\ServiceProvider;


/**
 * php artisan vendor:publish --provider="stefanoregis\woocommercetolaravel\WoocommerceToLaravelServiceProvider"
 *
 * Class WoocommerceToLaravelServiceProvider
 * @package stefanoregis\woocommercetolaravel
 */

class WoocommerceToLaravelServiceProvider extends ServiceProvider
{
    public function boot()
    {



        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->publishes([
            __DIR__.'/config/woocommercetolaravel.php' => config_path('woocommercetolaravel.php'),
        ]);
    }

    protected $commands = [
        'stefanoregis\woocommercetolaravel\Console\Commands\WoocommerceToLaravelCommand',

    ];

    public function register()
    {


        $this->commands($this->commands);

    }
}

?>