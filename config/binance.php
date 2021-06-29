<?php

return [
    'key'        => env('BINANCE_KEY', ''),
    'secret'     => env('BINANCE_SECRET', ''),
    'recvWindow' => env('BINANCE_RECV_WINDOW', 5000),

    'host' => [
        'spot'   => env('BINANCE_HOST_SPOT', 'https://api.binance.com'),
        'future' => env('BINANCE_HOST_FUTURE', 'https://fapi.binance.com'),
    ]
];
