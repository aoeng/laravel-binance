<?php

namespace Aoeng\Laravel\Binance\Facades;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @method static \Aoeng\Laravel\Binance\BinanceSpot spot($key = null, $secret = null)
 * @method static \Aoeng\Laravel\Binance\BinanceFuture future($key = null, $secret = null)
 */
class Binance extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'binance';
    }
}
