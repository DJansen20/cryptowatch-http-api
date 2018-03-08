<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Common;

abstract class Response
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $json;

    /**
     * Response constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        $this->json = $json;
        $this->data = json_decode($json, true);
    }

    /**
     * returns response as Array
     *
     * @return array
     */
    public function asArray(): array
    {
        return $this->data;
    }

    /**
     * Returns the response in json format
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return $this->json;
    }
}