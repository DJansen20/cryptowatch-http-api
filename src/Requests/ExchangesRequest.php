<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Requests;

use Cryptowatch\Common\Request;
use Cryptowatch\Common\Traits\ExchangesTrait;

class ExchangesRequest extends Request
{
    use ExchangesTrait;

    /**
     * ExchangesRequest constructor.
     * @param null|string $exchange
     */
    public function __construct(?string $exchange = null)
    {
        $this->setController('exchanges');
        $this->setExchange($exchange);
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return rtrim(sprintf('%s/%s', $this->getController(), $this->getExchange()), '/');
    }
}