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
        $this->app->bind('binance', function ($app) {
            $config = $app->make('config')->get('binance', []);

            return new BinanceManager($app, $config);
        });

        $this->app->bind('binance.future', function ($app) {
            return new BinanceFuture();
        });

        $this->app->singleton('binance.spot', function ($app) {
            return new BinanceSpot();
        });

    }

}
