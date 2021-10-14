<?php

declare(strict_types=1);
/**
 * @name HttpAdapterInterface
 * @package Cryptowatch REST API client
 * @license MIT
 */

namespace Cryptowatch\Api\HttpAdapter;

interface HttpAdapterInterface
{
    public function sendRequest(string $url, array $headers = []): array;
}
