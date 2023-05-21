<?php
//Helper function to get calling codes from external api
use GuzzleHttp\Client;
function getCallingCode()
{
    $client = new Client();
    $response = $client->request('GET', getenv('REST_COUNTRIES_API_URL'), ['verify' => false]);
    $body = $response->getBody()->getContents();
    $country = json_decode($body);
    $ccode = [];
    foreach ($country as $data) {

        if (isset($data->idd->root) && !empty($data->idd->suffixes[0])) {
            //concadinating the root and suffix value from the external api
            $root =  $data->idd->root;
            $suf  = $data->idd->suffixes[0];
            $country_code = $root . $suf;
            $ccode[ $country_code]=  $data->name->common;
    
        }
    }
    return $ccode;
}
?>