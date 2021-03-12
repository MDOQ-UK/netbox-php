<?php

namespace wickedsoft\NetBox\Api;

class Ip extends AbstractApi
{
    /**
     * @see https://www.hostfact.nl/developer/api/crediteuren/add
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function add($params)
    {
        return $this->post(array_merge(['controller' => 'creditor', 'action' => 'add'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/crediteuren/delete
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($params)
    {
        return $this->post(array_merge(['controller' => 'creditor', 'action' => 'delete'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/crediteuren/edit
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function edit($params)
    {
        return $this->post(array_merge(['controller' => 'creditor', 'action' => 'edit'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/crediteuren/list
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list($params)
    {
        return $this->post(array_merge(['controller' => 'creditor', 'action' => 'list'], $params));
    }

    /**
     * @see https://www.hostfact.nl/developer/api/crediteuren/show
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($params)
    {
        return $this->post(array_merge(['controller' => 'creditor', 'action' => 'show'], $params));
    }
}
