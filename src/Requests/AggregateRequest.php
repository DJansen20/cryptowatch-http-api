<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Requests;

use Cryptowatch\Common\Request;

class AggregateRequest extends Request
{
    protected $method;

    /**
     * AggregateRequest constructor.
     * @param string $method
     * @throws \Exception
     */
    public function __construct(string $method)
    {
        $this->setController('markets');
        $this->setMethod($method);
    }

    /**
     * @param string $method
     * @throws \Exception
     */
    public function setMethod(string $method)
    {
        if ($method === 'summaries' || $method === 'prices') {
            $this->method = $method;
        } else {
            throw new \Exception('Invalid method provided. Must be either \'summaries\' or \'prices\'.');
        }
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return rtrim(sprintf('%s/%s', $this->getController(), $this->getMethod()), '/');
    }
}