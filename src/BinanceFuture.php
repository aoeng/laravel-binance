<?php


namespace Aoeng\Laravel\Binance;

/**
 * @group USDT永续合约 BinanceFuture
 * Class BinanceFuture
 * @package Aoeng\Laravel\Binance
 */
class BinanceFuture extends Binance
{

    public function __construct()
    {
        parent::__construct();
        $this->host = config('binance.host.future', 'https://fapi.binance.com');
    }

    public function exchangeInfo($symbol = null)
    {
        $this->type = 'GET';
        $this->path = '/fapi/v1/exchangeInfo';
        $this->data = array_merge($this->data, array_filter(compact('symbol')));
        return $this->exec();
    }


    public function positionSide()
    {
        $this->type = 'GET';
        $this->path = '/fapi/v1/positionSide/dual';

        return $this->exec();
    }

    public function changePositionSide($dualSidePosition)
    {
        $this->type = 'POST';
        $this->path = '/fapi/v1/positionSide/dual';
        $this->data = array_merge($this->data, compact('dualSidePosition'));
        return $this->exec();
    }

    public function leverBracket($symbol = null)
    {
        $this->type = 'GET';
        $this->path = '/fapi/v1/leverageBracket';

        $this->data = array_merge($this->data, array_filter(compact('symbol')));
        return $this->exec();
    }

    public function changeLever($symbol, $leverage)
    {
        $this->type = 'POST';
        $this->path = '/fapi/v1/leverage';
        $this->data = array_merge($this->data, compact('symbol', 'leverage'));
        return $this->exec();
    }

    /**
     *  全逐仓 changeMargin
     * @param $symbol
     * @param string $marginType [ISOLATEDISOLATED , CROSSED]
     * @return array|mixed
     */
    public function changeMarginModel($symbol, $marginType = 'ISOLATEDISOLATED')
    {
        $this->type = 'POST';
        $this->path = '/fapi/v1/marginType';
        $this->data = array_merge($this->data, compact('symbol', 'marginType'));
        return $this->exec();
    }

    /**
     * 增加减少保证金  changeMargin
     * @param $symbol
     * @param $amount
     * @param int $type
     * @param string $positionSide ['BOTH']/['LONG','SHORT']
     * @return array|mixed
     */
    public function changeMargin($symbol, $amount, $type = 1, $positionSide = '')
    {
        $this->type = 'POST';
        $this->path = '/fapi/v1/marginType';
        $this->data = array_merge($this->data, array_filter(compact('symbol', 'amount', 'type', 'positionSide')));
        return $this->exec();
    }

    public function balance()
    {
        $this->type = 'GET';
        $this->path = '/fapi/v2/balance';
        return $this->exec();
    }

    public function account()
    {
        $this->type = 'GET';
        $this->path = '/fapi/v2/account';
        return $this->exec();
    }

    public function positions($symbol = '')
    {
        $this->type = 'GET';
        $this->path = '/fapi/v2/positionRisk';
        $this->data = array_merge($this->data, array_filter(compact('symbol')));
        return $this->exec();
    }

    public function orderHistory($symbol, $orderId = null, $startTime = null, $endTime = null, $limit = 500)
    {
        $this->type = 'GET';
        $this->path = '/fapi/v1/allOrders';
        $this->data = array_merge($this->data, array_filter(compact('symbol', 'orderId', 'startTime', 'endTime', 'limit')));
        return $this->exec();
    }

    public function orderCancelAll($symbol)
    {
        $this->type = 'DELETE';
        $this->path = '/fapi/v1/allOpenOrders';
        $this->data = array_merge($this->data, array_filter(compact('symbol')));
        return $this->exec();
    }

    public function orderCancel($symbol, $orderId)
    {
        $this->type = 'DELETE';
        $this->path = '/fapi/v1/order';
        $this->data = array_merge($this->data, array_filter(compact('symbol', 'orderId')));
        return $this->exec();
    }

    public function orderSearch($symbol, $orderId)
    {
        $this->type = 'GET';
        $this->path = '/fapi/v1/order';
        $this->data = array_merge($this->data, array_filter(compact('symbol', 'orderId')));
        return $this->exec();
    }

    public function orderPlace(array $data = [])
    {
        $this->type = 'POST';
        $this->path = '/fapi/v1/order';
        $this->data = array_merge($this->data, array_filter($this->data));
        return $this->exec();
    }
}
