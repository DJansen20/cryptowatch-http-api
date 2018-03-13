<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Requests;

use Cryptowatch\Requests\AggregateRequest;
use PHPUnit\Framework\TestCase;

class AggregateRequestTest extends TestCase
{
    /**
     * @covers \Cryptowatch\Requests\AggregateRequest::__construct
     * @covers \Cryptowatch\Requests\AggregateRequest::setMethod
     *
     * @return AggregateRequest
     * @throws \Exception
     */
    public function testCanBeConstructed(): AggregateRequest
    {
        $request = new AggregateRequest('summaries');
        $this->assertInstanceOf('Cryptowatch\\Requests\\AggregateRequest', $request);

        return $request;
    }

    /**
     * @expectedException \Exception
     */
    public function testWrongMethodException(): void
    {
        new AggregateRequest('thisIsWrong');
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Requests\AggregateRequest::getMethod
     * @covers \Cryptowatch\Requests\AggregateRequest::withUri
     *
     * @param AggregateRequest $request
     */
    public function testWithUri(AggregateRequest $request): void
    {
        $this->assertEquals('markets/summaries', $request->withUri());
    }
}
