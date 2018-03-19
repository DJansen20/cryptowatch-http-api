<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Responses;

use Cryptowatch\Common\Response;

class PairsResponse extends Response
{
    /**
     * @var array
     */
    private $results;

    public function __construct(string $json)
    {
        parent::__construct($json);
        $this->results = $this->data['result'];
    }
}