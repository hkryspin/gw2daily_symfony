<?php

namespace AppBundle\Model;

class DailyEndpoint extends Endpoint
{
    public function apiUri()
    {
        return 'v2/achievements/daily';
    }
}