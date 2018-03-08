<?php
/**
 * @package Cryptowat.ch HTTP API
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Cryptowatch\Common;

class Transport
{
    /**
     * Perform the API call and create a response instance from the result
     *
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    public function send(Request $request): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->buildUrl($request));
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($result !== false) {
            return $result;
        }

        throw new \Exception('Unable to send request: ' . $error);
    }

    /**
     * Build the URL to call from the request object
     *
     * @param Request $request
     * @return string
     */
    protected function buildUrl(Request $request): string
    {
        return sprintf('%s%s', $request->getEndpoint(), $request->withUri());
    }
}