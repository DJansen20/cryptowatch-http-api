<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Common\Traits;

trait ExchangesTrait
{
    /**
     * @var string
     */
    protected $exchange;

    /**
     * @param string $exchange
     */
    public function setExchange(string $exchange): void
    {
        $this->exchange = $exchange;
    }

    /**
     * @return string
     */
    public function getExchange(): string
    {
        return $this->exchange;
    }
}