<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests\Common\Traits;

use PHPUnit\Framework\TestCase;
use Cryptowatch\Common\Traits\PairsTrait;

class PairsTraitTest extends TestCase
{
    use PairsTrait;

    /**
     * @covers \Cryptowatch\Common\Traits\PairsTrait::getPair
     * @covers \Cryptowatch\Common\Traits\PairsTrait::setPair
     *
     * @return void
     */
    public function testPairsTrait(): void
    {
        $this->setPair('btcusd');
        $this->assertEquals('btcusd', $this->getPair());
    }
}