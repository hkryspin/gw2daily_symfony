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
        /*
        $api = new GwApi();
        $dailies = $api->dailies()->get()->ids();

        $ids = $dailies[$page];
        $query = ['query' => 'ids=' . implode(',', $ids)];

        $achi = $api->achievements()->get($query);
        */

        //echo '<pre>'; print_r($achi); echo '</pre>';
        
        $secondTier = "[{\"id\":1975,\"name\":\"Daily Kryta Forager\",\"description\":\"Fueling the engines of the economy.\",\"requirement\":\"Gather raw materials by foraging plants in the following Kryta maps: Queensdale, Kessex Hills, Gendarran Fields, Harathi Hinterlands, Bloodtide Coast, and Southsun Cove.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[],\"tiers\":[{\"count\":4,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68138,\"count\":1}]},{\"id\":1939,\"name\":\"Daily Activity Participation\",\"description\":\"Get those bodies moving.\",\"requirement\":\"Participate in an activity.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":1,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68118,\"count\":1}]},{\"id\":1964,\"name\":\"Daily Plains of Ashford Event Completer\",\"description\":\"Scour the mountains.\",\"requirement\":\"Complete events in the Plains of Ashford in Ascalon.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[],\"tiers\":[{\"count\":4,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68149,\"count\":1}]},{\"id\":1967,\"name\":\"Daily Diessa Plateau Event Completer\",\"description\":\"Scour the mountains.\",\"requirement\":\"Complete events in Diessa Plateau in Ascalon.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[],\"tiers\":[{\"count\":4,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68149,\"count\":1}]},{\"id\":1881,\"name\":\"Daily Don't Touch the Shiny Minidungeon\",\"description\":\"\",\"requirement\":\"Complete the Don't Touch the Shiny minidungeon in Caledon Forest.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[],\"tiers\":[{\"count\":1,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68164,\"count\":1}]},{\"id\":1856,\"icon\":\"https://render.guildwars2.com/file/FE01AF14D91F52A1EF2B22FE0A552B9EE2E4C3F6/511340.png\",\"name\":\"Daily PvP Reward Earner\",\"description\":\"\",\"requirement\":\"Earn  reward from a PvP Reward Track.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":1,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68117,\"count\":1}]},{\"id\":1861,\"icon\":\"https://render.guildwars2.com/file/FE01AF14D91F52A1EF2B22FE0A552B9EE2E4C3F6/511340.png\",\"name\":\"Daily PvP Player Kills\",\"description\":\"Maybe they'll stay down today.\",\"requirement\":\"Kill, or help kill,  enemy player in a PvP match.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":3,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68117,\"count\":1}]},{\"id\":2116,\"icon\":\"https://render.guildwars2.com/file/FE01AF14D91F52A1EF2B22FE0A552B9EE2E4C3F6/511340.png\",\"name\":\"Daily Warrior or Mesmer Winner\",\"description\":\"\",\"requirement\":\"Win  PvP match as a warrior or mesmer.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":1,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68120,\"count\":1}]},{\"id\":2101,\"icon\":\"https://render.guildwars2.com/file/FE01AF14D91F52A1EF2B22FE0A552B9EE2E4C3F6/511340.png\",\"name\":\"Daily Thief or Elementalist Winner\",\"description\":\"\",\"requirement\":\"Win  PvP match as a thief or elementalist.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":1,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":68120,\"count\":1}]},{\"id\":946,\"icon\":\"https://render.guildwars2.com/file/2BBA251A24A2C1A0A305D561580449AF5B55F54F/338457.png\",\"name\":\"Daily Master of Monuments\",\"description\":\"\",\"requirement\":\"Capture  ruin or shrine in any of the WvW Borderlands.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":1,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":78485,\"count\":1}]},{\"id\":1849,\"icon\":\"https://render.guildwars2.com/file/2BBA251A24A2C1A0A305D561580449AF5B55F54F/338457.png\",\"name\":\"Daily WvW Land Claimer\",\"description\":\"\",\"requirement\":\"Claim land for your realm in World versus World.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":1,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":78485,\"count\":1}]},{\"id\":1850,\"icon\":\"https://render.guildwars2.com/file/2BBA251A24A2C1A0A305D561580449AF5B55F54F/338457.png\",\"name\":\"Daily WvW Camp Capturer\",\"description\":\"\",\"requirement\":\"Capture supply camps for your realm in World versus World.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":2,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":78353,\"count\":1}]},{\"id\":1843,\"icon\":\"https://render.guildwars2.com/file/2BBA251A24A2C1A0A305D561580449AF5B55F54F/338457.png\",\"name\":\"Daily WvW Tower Capturer\",\"description\":\"\",\"requirement\":\"Capture towers for your realm in World versus World.\",\"locked_text\":\"\",\"type\":\"Default\",\"flags\":[\"Pvp\"],\"tiers\":[{\"count\":1,\"points\":0}],\"rewards\":[{\"type\":\"Item\",\"id\":78353,\"count\":1}]}]";
        $secondTierDecoded = json_decode($secondTier);

        return $this->render('default/index.html.twig',
            array('dailies_info' => $secondTierDecoded, 'page' => $page)
        );
    }
}
