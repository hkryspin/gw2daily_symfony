<?php

namespace AppBundle\Model;

class Endpoints
{
    const ACHIEVEMENTS = 'v2/achievements';
    const DAILY = 'v2/achievements/daily';

    protected $endpoint;

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }
}