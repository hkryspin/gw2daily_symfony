<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Model\GwApi;
// https://api.guildwars2.com/v2/achievements/daily
// https://api.guildwars2.com/v2/achievements?ids=1975,1939,1964,1967,1881,1856,1861,2116,2101,946,1849,1850,1843

class DefaultController extends Controller
{
    /**
     * @Route("/{page}", defaults={"page" = "pve"})
     */
    public function showAction($page)
    {
        $api = new GwApi();
        $dailies = $api->dailies()->get()->ids();

        $ids = $dailies[$page];
        $query = ['query' => 'ids=' . implode(',', $ids)];

        $achi = $api->achievements()->get($query);

        //echo '<pre>'; print_r($achi); echo '</pre>';

        return $this->render('default/index.html.twig',
            array('dailies_info' => $achi, 'page' => $page)
        );
    }
}
