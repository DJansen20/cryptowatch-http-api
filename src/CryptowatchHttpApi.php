<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch;

use Cryptowatch\Common\Request;
use Cryptowatch\Common\Transport;
use Cryptowatch\Requests\AggregateRequest;
use Cryptowatch\Requests\AssetsRequest;
use Cryptowatch\Requests\ExchangesRequest;
use Cryptowatch\Requests\MarketsRequest;
use Cryptowatch\Requests\PairsRequest;
use Cryptowatch\Responses\AggregateResponse;
use Cryptowatch\Responses\AssetsResponse;
use Cryptowatch\Responses\ExchangesResponse;
use Cryptowatch\Responses\MarketsResponse;
use Cryptowatch\Responses\PairsResponse;

class CryptowatchHttpApi
{
    /**
     * @param null|string $asset
     * @throws \Exception
     * @return AssetsResponse
     */
    public static function getAssets(?string $asset = null): AssetsResponse
    {
        $request = new AssetsRequest($asset);
        $json = self::sendRequest($request);
        $response = new AssetsResponse($json);

        return $response;
    }

    /**
     * @param null|string $pair
     * @return PairsResponse
     * @throws \Exception
     */
    public static function getPairs(?string $pair = null): PairsResponse
    {
        $request = new PairsRequest($pair);
        $json = self::sendRequest($request);
        $response = new PairsResponse($json);

        return $response;
    }

    /**
     * @param null|string $exchange
     * @return ExchangesResponse
     * @throws \Exception
     */
    public static function getExchanges(?string $exchange = null): ExchangesResponse
    {
        $request = new ExchangesRequest($exchange);
        $json = self::sendRequest($request);
        $response = new ExchangesResponse($json);

        return $response;
    }

    /**
     * @param null|string $method
     * @return AggregateResponse
     * @throws \Exception
     */
    public static function getAggregate(string $method): AggregateResponse
    {
        $request = new AggregateRequest($method);
        $json = self::sendRequest($request);
        $response = new AggregateResponse($json);

        return $response;
    }

    /**
     * @param null|string $exchange
     * @param null|string $pairs
     * @param null|string $subcommand
     * @param array|null $params
     * @return MarketsResponse
     * @throws Exceptions\ParameterException
     * @throws \Exception
     */
    public static function getMarkets(?string $exchange = null, ?string $pairs = null, ?string $subcommand = null, ?array $params = []): MarketsResponse
    {
        $request = new MarketsRequest($exchange, $pairs, $subcommand, $params);
        $json = self::sendRequest($request);
        $response = new MarketsResponse($json);

        return $response;
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    private static function sendRequest(Request $request): string
    {
        $transport = new Transport();
        return $transport->send($request);
    }
}
