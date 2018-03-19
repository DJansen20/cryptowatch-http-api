<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Tests;

use PHPUnit\Framework\TestCase;
use Cryptowatch\CryptowatchHttpApi;

class CryptowatchHttpApiTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGetAssets(): void
    {
        $response = CryptowatchHttpApi::getAssets('neo');
        $this->assertInstanceOf('Cryptowatch\\Responses\\AssetsResponse', $response);
    }

    /**
     * @throws \Exception
     */
    public function testGetPairs(): void
    {
        $response = CryptowatchHttpApi::getPairs('neobtc');
        $this->assertInstanceOf('Cryptowatch\\Responses\\PairsResponse', $response);
    }

    /**
     * @throws \Exception
     */
    public function testGetExchanges(): void
    {
        $response = CryptowatchHttpApi::getExchanges('bitstamp');
        $this->assertInstanceOf('Cryptowatch\\Responses\\ExchangesResponse', $response);
    }

    /**
     * @throws \Exception
     */
    public function testGetAggregate(): void
    {
        $response = CryptowatchHttpApi::getAggregate('prices');
        $this->assertInstanceOf('Cryptowatch\\Responses\\AggregateResponse', $response);
    }
}