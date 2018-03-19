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
     * @covers \Cryptowatch\CryptowatchHttpApi::getAssets
     *
     * @throws \Exception
     */
    public function testGetAssets(): void
    {
        $response = CryptowatchHttpApi::getAssets('neo');
        $this->assertInstanceOf('Cryptowatch\\Responses\\AssetsResponse', $response);
    }

    /**
     * @covers \Cryptowatch\CryptowatchHttpApi::getPairs
     *
     * @throws \Exception
     */
    public function testGetPairs(): void
    {
        $response = CryptowatchHttpApi::getPairs('neobtc');
        $this->assertInstanceOf('Cryptowatch\\Responses\\PairsResponse', $response);
    }

    /**
     * @covers \Cryptowatch\CryptowatchHttpApi::getExchanges
     *
     * @throws \Exception
     */
    public function testGetExchanges(): void
    {
        $response = CryptowatchHttpApi::getExchanges('bitstamp');
        $this->assertInstanceOf('Cryptowatch\\Responses\\ExchangesResponse', $response);
    }

    /**
     * @covers \Cryptowatch\CryptowatchHttpApi::getAggregate
     *
     * @throws \Exception
     */
    public function testGetAggregate(): void
    {
        $response = CryptowatchHttpApi::getAggregate('prices');
        $this->assertInstanceOf('Cryptowatch\\Responses\\AggregateResponse', $response);
    }

    /**
     * @covers \Cryptowatch\CryptowatchHttpApi::getMarkets
     *
     * @throws \Cryptowatch\Exceptions\ParameterException
     * @throws \Exception
     */
    public function testGetMarkets(): void
    {
        $params = [
            'after' => 1481563244,
            'before' => 1481663244,
            'periods' => 86400
        ];

        $response = CryptowatchHttpApi::getMarkets('bitstamp', 'btcusd', 'ohlc', $params);
        $this->assertInstanceOf('Cryptowatch\\Responses\\MarketsResponse', $response);
    }
}