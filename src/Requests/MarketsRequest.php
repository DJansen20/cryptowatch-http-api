<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Requests;

use Cryptowatch\Common\Request;
use Cryptowatch\Common\Traits\ExchangesTrait;
use Cryptowatch\Common\Traits\PairsTrait;
use Cryptowatch\Exceptions\ParameterException;

class MarketsRequest extends Request
{
    use ExchangesTrait;
    use PairsTrait;

    const ALLOWED_SUBCOMMANDS = [
        'price',
        'summary',
        'orderbook',
        'trades',
        'ohlc'
    ];

    const ALLOWED_PARAMS = [
        'trades' => ['limit', 'since'],
        'ohlc' => ['before', 'after', 'periods']
    ];

    /**
     * @var string
     */
    protected $subcommand;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * MarketsRequest constructor.
     * @param null|string $exchange
     * @param null|string $pair
     * @param null|string $subcommand
     * @param array $params
     * @throws ParameterException
     */
    public function __construct(
        ?string $exchange = null,
        ?string $pair = null,
        ?string $subcommand = null,
        ?array $params = []
    ) {
        $this->setController('markets');
        $this->setExchange($exchange);
        $this->setPair($pair);
        $this->setSubcommand($subcommand);
        $this->paramBuilder($params);
    }

    /**
     * @return null|string
     */
    public function getSubcommand(): ?string
    {
        return $this->subcommand;
    }

    /**
     * @param null|string $subcommand
     * @throws ParameterException
     */
    public function setSubcommand(?string $subcommand): void
    {
        if (!in_array($subcommand, self::ALLOWED_SUBCOMMANDS)) {
            throw new ParameterException(sprintf('%s is not a valid subcommand', $subcommand));
        } else {
            $this->subcommand = $subcommand;
        }
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        $url = rtrim(sprintf('%s/%s/%s/%s', $this->getController(), $this->getExchange(), $this->getPair(),
            $this->getSubcommand()), '/');
        if (!empty($this->parameters)) {
            return sprintf('%s?%s', $url, http_build_query($this->parameters));
        } else {
            return $url;
        }
    }

    /**
     * Checks which parameters were given and validate them
     *
     * @param array $params
     */
    private function paramBuilder(array $params): void
    {
        foreach ($params as $param => $value) {
            switch ($this->getSubcommand()) {
                case 'trades':
                    if (in_array($param, self::ALLOWED_PARAMS['trades'])) {
                        $this->parameters[$param] = $value;
                    }
                    break;

                case 'ohlc':
                    if (in_array($param, self::ALLOWED_PARAMS['ohlc'])) {
                        $this->parameters[$param] = $value;
                    }
                    break;
            }
        }
    }
}