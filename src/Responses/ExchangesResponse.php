<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Responses;

use Cryptowatch\Common\Response;

class ExchangesResponse extends Response
{
    /**
     * @var
     */
    private $results;

    /**
     * ExchangesResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        parent::__construct($json);
        $this->results = $this->data['result'];
    }
}