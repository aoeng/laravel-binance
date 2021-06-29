<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Aoeng\Laravel\Binance;

use GuzzleHttp\Exception\RequestException;
use Exception;

class Binance
{
    protected $key = '';

    protected $secret = '';

    protected $host = '';

    protected $nonce = '';

    protected $signature = '';

    protected $headers = [];

    protected $type = '';

    protected $path = '';

    protected $data = [];

    protected $options = [];

    public function __construct()
    {
        $this->key = config('binance.key', '');
        $this->secret = config('binance.secret', '');
    }

    public function keySecret($key, $secret)
    {
        $this->key = $key;
        $this->secret = $secret;

        return $this;
    }

    function setOptions(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * 认证
     * */
    protected function auth()
    {
        $this->nonce();

        $this->signature();

        $this->headers();

        $this->options();
    }

    /**
     * 过期时间
     * */
    protected function nonce()
    {
        $this->nonce = '';
    }

    /**
     * 签名
     * */
    protected function signature()
    {
        if (empty($this->secret) || empty($this->data)) return;

        $query = http_build_query($this->data, '', '&');

        $this->signature = $query . '&signature=' . hash_hmac('sha256', $query, $this->secret);
    }

    /**
     * 默认头部信息
     * */
    protected function headers()
    {
        $this->headers = [
            'X-MBX-APIKEY' => $this->key,
        ];
    }

    /**
     * 请求设置
     * */
    protected function options()
    {
        if (isset($this->options['headers'])) $this->headers = array_merge($this->headers, $this->options['headers']);

        $this->options['headers'] = $this->headers;
        $this->options['timeout'] = $this->options['timeout'] ?? 60;
    }

    /**
     * 发送http
     * */
    protected function send()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request($this->type, $this->host . $this->path . '?' . $this->signature, $this->options);

        $this->signature = '';

        return $response->getBody()->getContents();
    }

    /*
     * 执行流程
     * */
    protected function exec()
    {
        $this->auth();

        //可以记录日志
        try {
            return json_decode($this->send(), true);
        } catch (RequestException $e) {
            info('ERROR:', [$e->getMessage()]);
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
