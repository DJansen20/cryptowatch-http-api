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
     * @var null|string
     */
    protected $pair;

    /**
     * @param null|string $pair
     */
    public function setPair(?string $pair): void
    {
        $this->pair = $pair;
    }

    /**
     * @return null|string
     */
    public function getPair(): ?string
    {
        return $this->pair;
    }
}