<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 21/11/2018
 * Time: 13:41
 */

namespace Nybbl\Url;

use Nybbl\Url\Api;
use Nybbl\Url\Api\AbstractApi;

/**
 * Class Client
 * @package Nybbl\Url
 */
class Client extends AbstractApi
{
    /**
     * Client constructor.
     * @param string $endpoint
     * @param string $accessToken
     * @throws \ErrorException
     */
    public function __construct(string $endpoint, string $accessToken = '')
    {
        parent::__construct($endpoint, $accessToken);
    }

    /**
     * @param string $name
     * @return Api\Link
     * @throws \ErrorException
     */
    public function api(string $name)
    {
        switch ($name) {
            case 'link':
                return new Api\Link($this->getEndpoint(), $this->getAccessToken());
                break;

            default:
                throw new \Exception('Unknown class! You tried to call: ' . $name);
        }
    }

    /**
     * Proxies $class->link() to $class->api('link')
     *
     * @param string $name
     * @param $args
     * @return Api\Link
     * @throws \ErrorException
     */
    public function __call(string $name, $args)
    {
        return $this->api($name);
    }
}