<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Requests;

use Cryptowatch\Requests\ExchangesRequest;
use PHPUnit\Framework\TestCase;

class ExchangesRequestTest extends TestCase
{
    /**
     * @covers \Cryptowatch\Requests\ExchangesRequest::__construct
     *
     * @return ExchangesRequest
     */
    public function testCanBeConstructed(): ExchangesRequest
    {
        $request = new ExchangesRequest('bitstamp');
        $this->assertInstanceOf('\\Cryptowatch\\Requests\\ExchangesRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Requests\ExchangesRequest::withUri
     *
     * @param ExchangesRequest $request
     */
    public function testWithUri(ExchangesRequest $request): void
    {
        $this->assertEquals('exchanges/bitstamp', $request->withUri());
    }
}
