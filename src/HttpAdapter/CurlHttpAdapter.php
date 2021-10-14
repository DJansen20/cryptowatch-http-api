<?php

declare(strict_types=1);
/**
 * @name CurlHttpAdapter
 * @package Cryptowatch REST API client
 * @license MIT
 */

namespace Cryptowatch\Api\HttpAdapter;

use function Safe\curl_exec;
use function Safe\curl_setopt;
use function Safe\sprintf;

final class CurlHttpAdapter implements HttpAdapterInterface
{
    private const DEFAULT_TIMEOUT = 5;
    private const DEFAULT_CONNECT_TIMEOUT = 1;

    public function sendRequest(string $url, array $headers = []): array
    {
        $curl = curl_init($url);
        $headers['Content-Type'] = "application/json";

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->parseHeaders($headers));
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, self::DEFAULT_CONNECT_TIMEOUT);
        curl_setopt($curl, CURLOPT_TIMEOUT, self::DEFAULT_TIMEOUT);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($curl);
    }

    private function parseHeaders(array $headers): array
    {
        $results = [];
        foreach ($headers as $key => $value) {
            $result[] = sprintf('%s: %s', $key, $value);
        }

        return $results;
    }
}
