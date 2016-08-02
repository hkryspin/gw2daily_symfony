<?php

namespace AppBundle\Model;

class GwDaily
{

    private $api;
    private $response;

    public function __construct()
    {
        $this->api = new GwApi();
    }

    public function getDaily()
    {
        $this->api->setEndpoint(Endpoint::DAILY);
        $this->response = $this->api->callApi();
        return $this->api->callApi();
    }

    public function asArray()
    {
        $this->response = $this->response;
        return json_decode($this, true);
    }
}

//public function getIdsByCategory() // make private
//{
//    foreach($this->json as $category => $dailies) {
//        foreach($dailies as $i => $daily) {
//            $this->dailyCategory[$category][] = $daily->id;
//        }
//    }
//    return $this->dailyCategory;
//}