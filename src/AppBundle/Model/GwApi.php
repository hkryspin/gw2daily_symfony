<?php

namespace AppBundle\Model;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

class GwApi extends Endpoints
{
    protected $options;
    private $apiUrl = 'https://api.guildwars2.com/';
    private $client;

    function __construct(array $options = [])
    {
        $this->options = $this->getOptions($options);
        $this->client = new Client($this->options);
    }

    protected function getOptions(array $options = [])
    {
        return $options + ['base_uri' => $this->apiUrl];
    }

    public function callApi()
    {
        $uri = new Uri($this->endpoint);
        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        return $response;
    }

    public function __toString()
    {
        return __METHOD__ . '</br>apiUrl = ' . $this->apiUrl;
    }
}

//    public function daily()
//    {
//        $uri = new Uri('v2/achievements/daily');
//        $request = new Request('GET', $uri);
//        $response = $this->client->send($request);
//        return $response;
//    }
//
//    $client = new Client();
//    $response = $client->request('GET', 'https://api.guildwars2.com/v2/achievements/daily');
//    $content = $response->getBody()->getContents();
//    $content = json_decode($content, true);
//
//    $client = new Client(["base_uri" => "https://api.guildwars2.com/"]);
//    $uri = new Uri('v2/achievements/daily');
//    $request = new Request('GET', $uri);
//    $response = $client->send($request);
//    $content = $response->getBody()->getContents();
//    $content = json_decode($content, true);
//
//public function achievements() {
//    return new AchievementEndpoint( $this );
//}
