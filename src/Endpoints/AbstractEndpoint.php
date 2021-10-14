<?php

declare(strict_types=1);
/**
 * @name AbstractEndpoint
 * @package Cryptowatch REST API client
 * @license MIT
 */

namespace Cryptowatch\Api\Endpoints;

abstract class AbstractEndpoint
{
    public function details(): void
    {
        throw new \BadMethodCallException('Method not yet implemented');
    }

    public function list(): void
    {
        throw new \BadMethodCallException('Method not yet implemented');
    }

    abstract public static function endpointName(): string;
}
