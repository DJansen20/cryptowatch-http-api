<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Requests;

use Cryptowatch\Common\Request;
use Cryptowatch\Common\Traits\PairsTrait;

class PairsRequest extends Request
{
    use PairsTrait;

    /**
     * PairsRequest constructor.
     * @param null|string $pair
     */
    public function __construct(?string $pair = null)
    {
        $this->setController('pairs');
        $this->setPair($pair);
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return rtrim(sprintf('%s/%s', $this->getController(), $this->getPair()), '/');
    }
}