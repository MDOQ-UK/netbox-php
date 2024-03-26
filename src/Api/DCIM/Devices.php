<?php

namespace mkevenaar\NetBox\Api\DCIM;

use GuzzleHttp\Exception\GuzzleException;
use mkevenaar\NetBox\Api\AbstractApi;
use mkevenaar\NetBox\Response\Iterator;

class Devices extends AbstractApi
{
    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function add(array $params = []): array
    {
        return $this->post("/dcim/devices/", $params);
    }

    /**
     * @param int $id
     * @param array $params
     * @return bool
     * @throws GuzzleException
     */
    public function remove(int $id, array $params = []): bool
    {
        return $this->delete("/dcim/devices/" . $id . "/", $params);
    }

    /**
     * @param int $id
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function edit(int $id, array $params = []): array
    {
        return $this->put("/dcim/devices/" . $id . "/", $params);
    }

    /**
     * @param int $id
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function update(int $id, array $params = []): array
    {
        return $this->patch("/dcim/devices/" . $id . "/", $params);
    }

    /**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function list(array $params = [])
    {
        return $this->get("/dcim/devices/", $params);
    }

    /**
     * @param array $params
     * @return Iterator
     * @throws GuzzleException
     */
    public function listAll(array $params = [])
    {
        return new Iterator(
            $this,
            $params
        );
    }

    /**
     * @param int $id
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function show(int $id, array $params = [])
    {
        return $this->get("/dcim/devices/" . $id . "/", $params);
    }

    /**
     * @param int $id
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function napalm(int $id, array $params = [])
    {
        return $this->get("/dcim/devices/" . $id . "/napalm/", $params);
    }
}
