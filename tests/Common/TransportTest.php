<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Common;

use Cryptowatch\Common\Transport;
use PHPUnit\Framework\TestCase;

class TransportTest extends TestCase
{
    /**
     * Test if the Transport object can be created
     *
     * @return Transport
     * @throws \Exception
     */
    public function testCanBeConstructed(): Transport
    {
        $transport = new Transport();
        $this->assertInstanceOf('Cryptowatch\\Common\\Transport', $transport);
        return $transport;
    }
}