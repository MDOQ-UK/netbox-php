<?php

namespace mkevenaar\NetBox\Api;

use GuzzleHttp\Exception\GuzzleException;

interface ApiInterface
{
/**
     * @param array $params
     * @return mixed
     * @throws GuzzleException
     */
    public function list(array $params = []);
}
