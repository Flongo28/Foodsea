<?php
    namespace App\ChefkochAPI\Crawler;

    /*
    * Searches a website content with curl
    */
    class HttpClient {
        const URL = 'https://api.chefkoch.de/v2/recipes/';

        public static function sendRequest($url) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            $decoded_response = json_decode($response);
            return $decoded_response;
        }
    }
?>