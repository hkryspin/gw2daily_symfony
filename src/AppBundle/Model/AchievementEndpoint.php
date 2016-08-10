<?php

namespace AppBundle\Model;

class AchievementEndpoint extends Endpoint
{
    private $json;

    public function url()
    {
        return 'v2/achievements';
    }

    public function get(array $query = [])
    {
        $response = $this->request($query);
        $content = $response->getBody()->getContents();
        $this->json = json_decode($content);
        return $this->json;
    }

//    public function get()
//    {
//        return $this->request();
//    }
}