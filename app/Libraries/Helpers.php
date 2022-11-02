<?php

namespace App\Libraries;

use App\Models\Member;
use GuzzleHttp\Client;

class Helpers {

    /**
     * ------------------
     * 
     * Pass in a Member and recieve their youtube subscriber count.
     * 
     * ------------------
     * 
     * @param Member (Pass in the Member we want the subscribers for.)
     * @return string
     */
    public static function getSubCount(Member $member) : string {
        $client = new Client();
        $response = $client->request(
            'GET',
            "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=".$member->youtube_channel_id."&key=".env('YOUTUBE_API_KEY')
        );

        $body = json_decode($response->getBody());

        if ($response->getStatusCode() == 200) {
            if ($body) {
                return number_format($body->items[0]->statistics->subscriberCount, 0, '.', ',') . ' subs' ?? 0;
            }
        }
        
        return null;
    }

}