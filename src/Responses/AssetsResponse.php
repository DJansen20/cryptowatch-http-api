<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Responses;

use Cryptowatch\Common\Response;

class AssetsResponse extends Response
{
    /**
     * @var array
     */
    private $results;

    /**
     * AssetsResponse constructor.
     * @param string $json
     */
    public function __construct(string $json)
    {
        parent::__construct($json);
        $this->results = $this->data['result'];
    }
}