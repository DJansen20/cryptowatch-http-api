<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Common\Traits;

trait PairsTrait
{
    /**
     * @var string
     */
    protected $pair;

    /**
     * @param string $pair
     */
    public function setPair(string $pair): void
    {
        $this->pair = $pair;
    }

    /**
     * @return string
     */
    public function getPair(): string
    {
        return $this->pair;
    }
}