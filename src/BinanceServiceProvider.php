<?php

namespace Aoeng\Laravel\Binance;


use Illuminate\Support\ServiceProvider;

class BinanceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/binance.php' => config_path('binance.php'),
        ], 'binance');

    }

    public function register()
    {
        $this->app->singleton('binance', function ($app) {
            return new BinanceSpot();
        });

        $this->app->singleton('binanceFuture', function ($app) {
            return new BinanceFuture();
        });


    }

}
