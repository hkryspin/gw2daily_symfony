<?php

namespace AppBundle\Model;

class DailyEndpoint extends Endpoint
{
    private $json;
    
    public function url()
    {
        return 'v2/achievements/daily';
    }

    public function get()
    {
        $response = $this->request();
        $content = $response->getBody()->getContents();
        $this->json = json_decode($content);
        return $this;
    }
    
    public function ids()
    {
        $dailyCategory = [];
        foreach($this->json as $category => $dailies) {
            foreach($dailies as $i => $daily) {
                $dailyCategory[$category][] = $daily->id;
            }
        }
        return $dailyCategory;
    }
}