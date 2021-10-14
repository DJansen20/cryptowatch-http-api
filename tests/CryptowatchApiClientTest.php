<?php

declare(strict_types=1);
/**
 * @name CryptowatchApiClientTest
 * @package Cryptowatch REST API client
 * @license MIT
 */

namespace Cryptowatch\Api\Tests;

use Cryptowatch\Api\CryptowatchApiClient;
use PHPUnit\Framework\TestCase;

class CryptowatchApiClientTest extends TestCase
{
    public function testCreate(): void
    {
        $mockHttpAdapter =
        $cryptowatchApi = new CryptowatchApiClient();
        $this->assertInstanceOf(CryptowatchApiClient::class, $cryptowatchApi);
    }
}
