<?php

namespace AppBundle\Model;

class DailyEndpoint extends Endpoint
{
    public function apiUrl()
    {
        return 'v2/achievements/daily';
    }
}