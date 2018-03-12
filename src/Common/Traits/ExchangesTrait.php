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
     * @var null|string
     */
    protected $exchange;

    /**
     * @param null|string $exchange
     */
    public function setExchange(?string $exchange): void
    {
        $this->exchange = $exchange;
    }

    /**
     * @return null|string
     */
    public function getExchange(): ?string
    {
        return $this->exchange;
    }
}