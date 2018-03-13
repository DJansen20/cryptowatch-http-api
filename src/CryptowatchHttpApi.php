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
use Cryptowatch\Responses\AssetsResponse;

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