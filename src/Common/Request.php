<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Common;

abstract class Request
{
    /**
     * Controller we want to use
     *
     * @var string $controller
     */
    protected $controller;

    /**
     * Endpoint we want to connect to
     *
     * @var string $endpoint
     */
    protected $endpoint = 'https://api.cryptowat.ch';

    /**
     * @param string $controller
     */
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Every request must implement a withUri
     *
     * @return string
     */
    abstract public function withUri(): string;
}
