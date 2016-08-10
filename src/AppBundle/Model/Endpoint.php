<?php

namespace AppBundle\Model;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

abstract class Endpoint
{
    protected $api;

    public function __construct(GwApi $api)
    {
        $this->api = $api;
    }

    protected function request(array $query = [])
    {
        $request = $this->createRequest($query);
        $response = $this->api->getClient()->send($request);
        return $response;
    }
    //$uri = Uri::withQueryValue($uri, 'ids', '1975');

    protected function createRequest(array $query = [])
    {
        $uri = new Uri($this->url());
        $request = new Request('GET', $uri);
        $request = \GuzzleHttp\Psr7\modify_request($request, $query);
        //echo $request->getUri()->getQuery();
        return $request;
    }

    public function __toString()
    {
        return __CLASS__ . '</br>url = ' . $this->url();
    }

    abstract public function url();
}