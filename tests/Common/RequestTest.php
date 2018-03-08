<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Common;

use Cryptowatch\Common\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * @covers \Cryptowatch\Common\Request::__construct
     *
     * @return Request
     */
    public function testCanBeConstructed(): Request
    {
        $request = new class extends Request {
            public function __construct()
            {
                $this->setController('markets');
            }

            public function withUri(): string
            {
                return 'testString';
            }
        };

        $this->assertInstanceOf('Cryptowatch\\Common\\Request', $request);
        return $request;
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Common\Request::getController()
     *
     * @param Request $request
     */
    public function testGetController(Request $request)
    {
        $this->assertEquals('markets', $request->getController());
    }

    /**
     * @depends testCanBeConstructed
     * @covers \Cryptowatch\Common\Request::getEndpoint()
     *
     * @param Request $request
     */
    public function testGetEndpoint(Request $request)
    {
        $this->assertEquals('https://api.cryptowat.ch', $request->getEndpoint());
    }
}
