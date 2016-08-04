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

    public function get()
    {
        $uri = new Uri($this->apiUrl());
        $request = new Request('GET', $uri);
        $response = $this->api->getClient()->send($request);
        return $response;
    }

    abstract public function apiUrl();
}