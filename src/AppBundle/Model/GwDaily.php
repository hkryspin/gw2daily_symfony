<?php

namespace AppBundle\Model;

class GwDaily extends GwApi
{
    public function getDaily()
    {
        $this->setEndpoint(Endpoints::DAILY);
        return $this->callApi();
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