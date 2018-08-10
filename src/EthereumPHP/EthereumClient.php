<?php

namespace EthereumPHP;

use EthereumPHP\Methods\Eth;
use EthereumPHP\Methods\Net;
use EthereumPHP\Methods\Personal;
use EthereumPHP\Methods\Shh;
use EthereumPHP\Methods\Web3;
use Graze\GuzzleHttp\JsonRpc\Client;

class EthereumClient
{
    private $client;

    public function __construct(string $url)
    {
        $this->client = Client::factory($url);
    }

    public function net(): Net
    {
        return new Net($this->client);
    }

    public function web3(): Web3
    {
        return new Web3($this->client);
    }

    public function shh(): Shh
    {
        return new Shh($this->client);
    }

    public function eth(): Eth
    {
        return new Eth($this->client);
    }

    public function personal(): Personal
    {
        return new Personal($this->client);
    }
}
