<?php

namespace AppBundle\Model;

class DailyEndpoint extends Endpoint
{
    public function url()
    {
        return 'v2/achievements/daily';
    }
}