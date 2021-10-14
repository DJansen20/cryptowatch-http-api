<?php

declare(strict_types=1);
/**
 * @name CryptowatchApiClient
 * @package Cryptowatch REST API client
 * @license MIT
 */

namespace Cryptowatch\Api;

use Cryptowatch\Api\Endpoints\Exchanges;
use Cryptowatch\Api\HttpAdapter\CurlHttpAdapter;
use Cryptowatch\Api\HttpAdapter\HttpAdapterInterface;

final class CryptowatchApiClient
{
    private Exchanges $exchanges;

    private HttpAdapterInterface $httpAdapter;

    public function __construct(HttpAdapterInterface $httpAdapter = null)
    {
        $this->httpAdapter = $httpAdapter ?: new CurlHttpAdapter();
        $this->exchanges = new Exchanges();
    }

    public function setApiKey(string $apiKey): void
    {
    }
}
