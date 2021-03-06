<?php

namespace AppBundle\Model;

use GuzzleHttp\Client;

class GwApi
{
    private $apiUrl = 'https://api.guildwars2.com/';
    private $client;

    function __construct()
    {
        $this->options = $this->getOptions();
        $this->client = new Client($this->options);
    }

    protected function getOptions()
    {
        return ['base_uri' => $this->apiUrl];
    }

    public function getClient()
    {
        return $this->client;
    }

    public function dailies()
    {
        return new DailyEndpoint($this);
    }

    public function achievements()
    {
        return new AchievementEndpoint($this);
    }
}
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
