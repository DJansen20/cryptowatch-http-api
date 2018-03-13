<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Requests;

use Cryptowatch\Requests\MarketsRequest;
use PHPUnit\Framework\TestCase;

class MarketsRequestTest extends TestCase
{
    const TEST_PARAMS = [
        'after' => 1481663244,
        'before' => 1482663255,
        'periods' => 86400
    ];

    /**
     * @covers \Cryptowatch\Requests\MarketsRequest::__construct
     * @covers \Cryptowatch\Requests\MarketsRequest::setSubcommand
     * @covers \Cryptowatch\Requests\MarketsRequest::paramBuilder
     *
     * @return MarketsRequest
     * @throws \Cryptowatch\Exceptions\ParameterException
     */
    public function testCanBeConstructed(): MarketsRequest
    {
        $request = new MarketsRequest('bitstamp', 'btcusd', 'ohlc', self::TEST_PARAMS);
        $this->assertInstanceOf('Cryptowatch\\Requests\\MarketsRequest', $request);

        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Requests\MarketsRequest::getSubcommand
     *
     * @param MarketsRequest $request
     */
    public function testGetSubcommand(MarketsRequest $request): void
    {
        $this->assertEquals('ohlc', $request->getSubcommand());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Requests\MarketsRequest::withUri
     *
     * @param MarketsRequest $request
     */
    public function testWithUri(MarketsRequest $request): void
    {
        $this->assertEquals('markets/bitstamp/btcusd/ohlc?after=1481663244&before=1482663255&periods=86400', $request->withUri());
    }

    /**
     * @throws \Cryptowatch\Exceptions\ParameterException
     * @expectedException \Cryptowatch\Exceptions\ParameterException
     */
    public function testThrowsParameterexception(): void
    {
        new MarketsRequest('bitstamp', 'btcusd', 'invalid');
    }
}