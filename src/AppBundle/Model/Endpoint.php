<?php

namespace AppBundle\Model;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use AppBundle\Model\GwApi;

abstract class Endpoint
{
    protected $api;

    public function __construct(GwApi $api)
    {
        $this->api = $api;
    }

    public function callApi()
    {
        $uri = new Uri($this->apiUri());
        $request = new Request('GET', $uri);
        $response = $this->api->getClient()->send($request);
        return $response;
    }

    abstract public function apiUri();
}