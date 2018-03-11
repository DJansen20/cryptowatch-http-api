<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

trait ExchangesTrait
{
    protected $exchange;

    public function setExchange(string $exchange): void
    {
        $this->exchange = $exchange;
    }

    public function getExchange(): string
    {
        return $this->exchange;
    }
}