<?php
/**
 * Created by PhpStorm.
 * User: Nic
 * Date: 21/11/2018
 * Time: 13:42
 */

namespace Nybbl\Url\Api;

/**
 * Class Link
 * @package Nybbl\Url\Api
 */
class Link extends AbstractApi
{
    const REDIRECT_TYPE_REDIRECT = 'redirect';
    const REDIRECT_TYPE_FRAME = 'frame';

    /**
     * @param string $url
     * @param string $redirectType
     * @param array $additionalData - can contain: 'note', 'isPublic', 'alias'
     * @return mixed
     */
    public function create(
        string $url,
        string $redirectType = self::REDIRECT_TYPE_REDIRECT,
        array $additionalData = []
    )
    {
        $postData = array_merge_recursive([
            'longLink' => $url,
            'redirectType' => $redirectType,
        ], $additionalData);

        return $this->post('/links', $postData);
    }

    /**
     * @param string|int $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->get(sprintf('/links/%s', $id));
    }

    /**
     * @param int $page
     * @return mixed
     */
    public function getList(int $page = 1)
    {
        return $this->get('/links', ['page' => $page]);
    }
}