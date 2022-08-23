<?php

namespace App\Services;

class KkboxService
{
    public function chart_playlists()
    {   
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.kkbox.com/v1.1/charts?territory=TW",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Bearer RzPOtzfhi-Amb0_9jto6kA=="
            ),
        ));

        $result = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($result, true);
        }
    }
}
