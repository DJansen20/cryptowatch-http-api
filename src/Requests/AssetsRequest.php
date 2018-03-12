<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Requests;

use Cryptowatch\Common\Request;

class AssetsRequest extends Request
{
    /**
     * @var string
     */
    protected $asset;

    /**
     * AssetsRequest constructor.
     * @param null|string $asset
     */
    public function __construct(?string $asset = null)
    {
        $this->setController('assets');
        $this->setAsset($asset);
    }

    /**
     * @return string
     */
    public function getAsset(): ?string
    {
        return $this->asset;
    }

    /**
     * @param string $asset
     */
    public function setAsset(?string $asset): void
    {
        $this->asset = $asset;
    }

    /**
     * @return string
     */
    public function withUri(): string
    {
        return rtrim(sprintf('$s/%s', $this->getController(), $this->getAsset()), '/');
    }
}
