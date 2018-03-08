<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Common;

use Cryptowatch\Common\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    const TEST = [
        'test' => [
            'blaat'
        ],
        'test2' => [
            'blaat2'
        ]
    ];
    /**
     * @covers \Cryptowatch\Common\Response
     * @covers \Cryptowatch\Common\Response::jsonSerialize
     * @covers \Cryptowatch\Common\Response::asArray
     *
     * @return void
     * @throws \ReflectionException
     */
    public function testCanBeConstructed()
    {
        /** @var $stub Response|\PHPUnit_Framework_MockObject_MockObject */
        $stub = $this->createMock('\\Cryptowatch\\Common\\Response');
        $stub->method('asArray')->willReturn(self::TEST);
        $stub->method('jsonSerialize')->willReturn(json_encode(self::TEST));
        $this->assertEquals(self::TEST, $stub->asArray());
        $this->assertEquals(json_encode(self::TEST), $stub->jsonSerialize());
    }
}