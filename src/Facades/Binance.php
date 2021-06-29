<?php

namespace Aoeng\Laravel\Binance\Facades;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @method static \Aoeng\Laravel\Binance\BinanceSpot  keySecret($key, $secret)
 * @method static array accounts()
 * @method static array transfer($amount, $type = 'MAIN_UMFUTURE', $asset = 'USDT')
 * @method static array orderPlace($data = [])
 * @method static array orderCancel($symbol, $orderId)
 * @method static array orderCancelAll($symbol)
 * @method static array orderSearch($symbol, $orderId)
 * @method static array orderHistory(array $data = [])
 */
class Binance extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'binance';
    }
}
