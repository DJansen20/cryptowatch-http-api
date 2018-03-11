<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

trait PairsTrait
{
    protected $pair;

    public function setPair(string $pair): void
    {
        $this->pair = $pair;
    }

    public function getPair(): string
    {
        return $this->pair;
    }
}