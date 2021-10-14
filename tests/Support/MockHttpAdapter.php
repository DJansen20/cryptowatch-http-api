<?php

declare(strict_types=1);
/**
 * @name MockHttpAdapter
 * @package Cryptowatch REST API client
 * @license MIT
 */

namespace Cryptowatch\Api\Tests\Support;

use Cryptowatch\Api\HttpAdapter\HttpAdapterInterface;

final class MockHttpAdapter implements HttpAdapterInterface
{
    public function sendRequest(string $url, array $headers = []): array
    {
    }
}
