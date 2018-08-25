<?php

namespace EthereumPHP\Types;

class TransactionReceipt
{

    private $blockHash;
    private $blockNumber;
    private $contractAddress;
    private $cumulativeGasUsed;
    private $from;
    private $gasUsed;
    private $logs;
    private $logsBloom;
    private $root;
    private $to;
    private $transactionHash;
    private $transactionIndex;

    public function __construct(array $response)
    {
        $this->blockHash = new BlockHash($response['blockHash']);
        $this->blockNumber = hexdec($response['blockNumber']);
        $this->contractAddress = $response['contractAddress'];
        $this->cumulativeGasUsed = hexdec($response['cumulativeGasUsed']);
        $this->from = new Address($response['from']);
        $this->gasUsed = hexdec($response['gasUsed']);
        $this->logs = $response['logs'];
        $this->logsBloom = $response['logsBloom'];
        $this->to = new Address($response['to']);
        $this->transactionHash = new BlockHash($response['transactionHash']);
        $this->transactionIndex = hexdec($response['transactionIndex']);
        $this->status = hexdec($response['status']);
    }

    public function blockHash(): BlockHash
    {
        return $this->blockHash;
    }

    public function blockNumber(): int
    {
        return $this->blockNumber;
    }

    public function from(): Address
    {
        return $this->from;
    }

    public function to(): Address
    {
        return $this->to;
    }

    public function gasUsed(): int
    {
        return $this->gasUsed;
    }

    public function contractAddress(): ?string
    {
        return $this->contractAddress;
    }

    public function cumulativeGasUsed(): int
    {
        return $this->cumulativeGasUsed;
    }

    public function logs(): array
    {
        return $this->logs;
    }

    public function logsBloom(): string
    {
        return $this->logsBloom;
    }

    public function transactionHash(): BlockHash
    {
        return $this->transactionHash;
    }

    public function transactionIndex(): int
    {
        return $this->transactionIndex;
    }

    public function status(): int
    {
        return $this->status;
    }

    public function toArray(){
        return [
            'blockHash' => $this->blockHash()->toString(),
            'blockNumber' => $this->blockNumber(),
            'from' => $this->from()->toString(),
            'to' => $this->to()->toString(),
            'gasUsed' => $this->gasUsed(),
            'contractAddress' => $this->contractAddress(),
            'cumulativeGasUsed' => $this->cumulativeGasUsed(),
            'logs' => $this->logs(),
            'logsBloom' => $this->logsBloom(),
            'transactionHash' => $this->transactionHash()->toString(),
            'transactionIndex' => $this->transactionIndex(),
            'status' => $this->status(),           
        ];
    }

     
}
