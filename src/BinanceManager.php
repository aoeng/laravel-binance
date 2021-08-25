<?php

namespace Aoeng\Laravel\Binance;

class BinanceManager
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;


    protected $config;

    public function __construct($app, array $config)
    {
        $this->app = $app;
        $this->config = $config;
    }

    public function spot($key = null, $secret = null)
    {
        $spot = new BinanceSpot();

        if ($key) {
            $spot->keySecret($key, $secret);
        }

        return $spot;
    }

    public function future($key = null, $secret = null)
    {
        $future = new BinanceFuture();

        if ($key) {
            $future->keySecret($key, $secret);
        }

        return $future;
    }

}
