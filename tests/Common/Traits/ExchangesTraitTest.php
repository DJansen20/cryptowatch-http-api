<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Common\Traits;

use PHPUnit\Framework\TestCase;
use Cryptowatch\Common\Traits\ExchangesTrait;

class ExchangesTraitTest extends TestCase
{
    use ExchangesTrait;

    /**
     * @covers \Cryptowatch\Common\Traits\ExchangesTrait::getExchange
     * @covers \Cryptowatch\Common\Traits\ExchangesTrait::setExchange
     *
     * @return void
     */
    public function testExchangesTrait(): void
    {
        $this->setExchange('bitstamp');
        $this->assertEquals('bitstamp', $this->getExchange());
    }
}
