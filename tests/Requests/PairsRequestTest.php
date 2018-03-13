<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Requests;

use PHPUnit\Framework\TestCase;

class PairsRequestTest extends TestCase
{
    /**
     * @covers \Cryptowatch\Requests\PairsRequest::__construct
     *
     * @return PairsRequest
     */
    public function testCanBeConstructed(): PairsRequest
    {
        $request = new PairsRequest('btcusd');
        $this->assertInstanceOf('\\Cryptowatch\\Requests\\PairsRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Requests\PairsRequest::withUri
     *
     * @param PairsRequest $request
     */
    public function testWithUri(PairsRequest $request): void
    {
        $this->assertEquals('pairs/btcusd', $request->withUri());
    }
}
