<?php

function get_data_by_ip($ip){

    if($ip == '127.0.0.1'){
        $ip = '';
    }

    $url = "http://ip-api.com/json/" . $ip;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    // if (isset($data['status'])){
    //     if ($data['status'] == 'success'){
    //         echo $data['country']; //Canada
    //         echo $data['countryCode']; //CA
    //         echo $data['region']; //QC
    //         echo $data['regionName']; //Quebec
    //         echo $data['city']; //Montreal
    //         echo $data['zip']; //H1K
    //         echo $data['lat']; //45.6085
    //         echo $data['lon']; //-73.5493
    //         echo $data['timezone']; //America/Toronto
    //         echo $data['isp']; //Le Groupe Videotron Ltee
    //         echo $data['org']; //Videotron Ltee
    //         echo $data['as']; //AS5769 Videotron Telecom Ltee
    //         echo $data['query']; // 24.48.0.1
    //     } elseif (($data['status'] == 'fail')){
    //         echo $data['message'];
    //     }
    // }
    return $data;
}

