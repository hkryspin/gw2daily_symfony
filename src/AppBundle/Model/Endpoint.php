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
        $uri = new Uri($this->url());
        //$uri = Uri::withQueryValue($uri, 'ids', '1975');
        $request = new Request('GET', $uri);
        $request = \GuzzleHttp\Psr7\modify_request($request, ['query' => 'ids=1975,1939,1964']);
        $response = $this->api->getClient()->send($request);
        return $response;
    }

    abstract public function url();
}