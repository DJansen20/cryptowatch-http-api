<?php

declare(strict_types=1);
/**
 * @name Exchanges
 * @package Cryptowatch REST API client
 * @license MIT
 */

namespace Cryptowatch\Api\Endpoints;

final class Exchanges extends AbstractEndpoint
{
    public static function endpointName(): string
    {
        return 'exchanges';
    }
}
