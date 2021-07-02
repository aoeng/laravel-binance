<?php


namespace Aoeng\Laravel\Binance;


/**
 * @group 现货 BinanceSpot
 * Class BinanceSpot
 * @package Aoeng\Laravel\Binance
 */
class BinanceSpot extends Binance
{

    public function __construct()
    {
        parent::__construct();

        $this->host = config('binance.host.spot', 'https://api.binance.com');
    }

    public function state()
    {
        $this->type = 'GET';
        $this->path = '/sapi/v1/account/apiTradingStatus';

        return $this->exec();
    }

    // ====================账户数据===============
    public function accounts()
    {
        $this->type = 'GET';
        $this->path = '/api/v3/account';

        return $this->exec();
    }


    public function transfer($amount, $type = 'MAIN_UMFUTURE', $asset = 'USDT')
    {
        $this->type = 'POST';
        $this->path = '/sapi/v1/asset/transfer';
        $this->data = array_merge($this->data, compact('type', 'asset', 'amount'));
        return $this->exec();
    }


    //========================现货交易==================
    public function orderPlace(array $data = [])
    {
        $this->type = 'POST';
        $this->path = '/api/v3/order';
        $this->data = array_merge($this->data, $data);
        return $this->exec();
    }

    public function orderCancel($symbol, $orderId)
    {
        $this->type = 'DELETE';
        $this->path = '/api/v3/order';
        $this->data = array_merge($this->data, array_filter(compact('symbol', 'orderId')));
        return $this->exec();
    }

    public function orderCancelAll($symbol)
    {
        $this->type = 'DELETE';
        $this->path = '/api/v3/openOrders';
        $this->data = array_merge($this->data, array_filter(compact('symbol')));
        return $this->exec();
    }

    public function orderSearch($symbol, $orderId)
    {
        $this->type = 'GET';
        $this->path = '/api/v3/order';
        $this->data = array_merge($this->data, array_filter(compact('symbol', 'orderId')));

        return $this->exec();
    }

    public function orderHistory(array $data = [])
    {
        $this->type = 'GET';
        $this->path = '/api/v3/allOrders';
        $this->data = array_merge($this->data, $data);

        return $this->exec();
    }

}
