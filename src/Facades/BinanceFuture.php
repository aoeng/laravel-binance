<?php

namespace Aoeng\Laravel\Binance\Facades;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @method static \Aoeng\Laravel\Binance\BinanceFuture  keySecret($key, $secret)
 * @method static array positionSide()
 * @method static array time()
 * @method static array changePositionSide($dualSidePosition)
 * @method static array exchangeInfo($symbol = null)
 * @method static array leverBracket($symbol = null)
 * @method static array changeLever($symbol, $leverage)
 * @method static array changeMarginModel($symbol, $marginType = 'ISOLATEDISOLATED')
 * @method static array changeMargin($symbol, $amount, $type = 1, $positionSide = '')
 * @method static array balance()
 * @method static array account()
 * @method static array positionRisk($symbol = '')
 * @method static array orderPlace(array $data = [])
 * @method static array orderCancel($symbol, $orderId)
 * @method static array orderCancelAll($symbol)
 * @method static array orderSearch($symbol, $orderId)
 * @method static array orderHistory($symbol, $orderId = 0, $startTime = null, $endTime = null, $limit = 500)
 * @method static array exchangeHistory($symbol, $fromId = 0, $startTime = null, $endTime = null, $limit = 500)
 * @method static array createListenKey()
 * @method static array putListenKey()
 * @method static array deleteListenKey()
 */
class BinanceFuture extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return 'binanceFuture';
    }
}
