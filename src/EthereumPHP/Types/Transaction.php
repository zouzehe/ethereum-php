<?php

namespace EthereumPHP\Types;

class Transaction
{
    private $from;
    private $to;
    private $data;
    private $gas;
    private $gasPrice;
    private $value;
    private $nonce;

    public function __construct(
        $from,
        Address $to,
        string $data = null,
        int $gas = null,
        Wei $gasPrice = null,
        int $value = null,
        int $nonce = null
    ) {
        $this->from = $from;
        $this->to = $to;
        $this->data = $data;
        $this->gas = $gas;
        $this->gasPrice = $gasPrice;
        $this->value = $value;
        $this->nonce = $nonce;
    }

    public function toArray(): array
    {

        $transaction = [
            'to' => $this->to->toString(),
        ];
        if (!is_null($this->from)) {
            $transaction['from'] =  $this->from->toString();
        }
        if (!is_null($this->data)) {
            $transaction['data'] =  substr($this->data,0,2) =='0x' ? $this->data : '0x'.dechex($this->data);
        }

        if (!is_null($this->gas)) {
            $transaction['gas'] = '0x'.dechex($this->gas);
        }

        if (!is_null($this->gasPrice)) {
            $transaction['gasPrice'] = '0x'.dechex($this->gasPrice->amount());
        }

        if (!is_null($this->value)) {
            $transaction['value'] = '0x'.dechex($this->value);
        }

        if (!is_null($this->nonce)) {
            $transaction['nonce'] = '0x'.dechex($this->nonce);
        }

        return $transaction;
    }
}
