<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch;

use Cryptowatch\Common\Request;
use Cryptowatch\Common\Transport;
use Cryptowatch\Requests\AssetsRequest;
use Cryptowatch\Requests\PairsRequest;
use Cryptowatch\Responses\AssetsResponse;
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