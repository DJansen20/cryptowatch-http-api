<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Requests;

use Cryptowatch\Requests\AssetsRequest;
use PHPUnit\Framework\TestCase;

class AssetsRequestTest extends TestCase
{
    /**
     * @covers \Cryptowatch\Requests\AssetsRequest::__construct
     * @covers \Cryptowatch\Requests\AssetsRequest::setAsset
     *
     * @return AssetsRequest
     */
    public function testCanBeConstructed(): AssetsRequest
    {
        $request = new AssetsRequest('btc');
        $this->assertInstanceOf('Cryptowatch\\Requests\\AssetsRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Requests\AssetsRequest::getAsset
     *
     * @param AssetsRequest $request
     */
    public function testGetAsset(AssetsRequest $request): void
    {
        $this->assertEquals('btc', $request->getAsset());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Requests\AssetsRequest::withUri
     *
     * @param AssetsRequest $request
     */
    public function testWithUri(AssetsRequest $request): void
    {
        $this->assertEquals('assets/btc', $request->withUri());
    }
}
