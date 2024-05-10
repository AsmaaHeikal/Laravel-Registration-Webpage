<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function extractId($str)
    {
        $str = trim($str, '/');
        // Split the string by '/'
        $parts = explode('/', $str);
        // Return the last part which is the ID
        return end($parts);
    }

    public function getActorDetails($actorId)
    {
        // IMDb API endpoint URL
        $url = 'https://imdb8.p.rapidapi.com/actors/get-bio';

        // Parameters to be sent with the request
        $params = ['nconst' => $actorId];

        // Initialize cURL session
        $curl = curl_init();

        $api_host = "imdb8.p.rapidapi.com";
        $api_key = "c338cc6956mshe64ead07f4591fap1d9e75jsn2f2b2f761787";

        // Set the cURL options
        curl_setopt_array($curl, [
            CURLOPT_URL => $url . '?' . http_build_query($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: " . $api_host,
                "X-RapidAPI-Key: " . $api_key
            ],
        ]);

        // Execute the request and fetch the response
        $response = curl_exec($curl);

        // Check for errors
        if ($response === false) {
            echo 'Error: ' . curl_error($curl);
            return null;
        } else {
            // Decode the JSON response
            $data = json_decode($response, true);
            return $data;
        }
    }

    public function getActorsNames(Request $request){
        if ($request->has('birthdate')) {
            // Retrieve birthdate from the form
            $birthdate = $request->birthdate;

            // IMDb API endpoint URL
            $url = 'https://imdb8.p.rapidapi.com/actors/list-born-today';

            // Parameters to be sent with the request
            $params = [
                'month' => date('m', strtotime($birthdate)), // Extract month from birthdate
                'day' => date('d', strtotime($birthdate)) // Extract day from birthdate
            ];

            // Initialize cURL session
            $curl = curl_init();

            $api_host = "imdb8.p.rapidapi.com";
            $api_key = "c338cc6956mshe64ead07f4591fap1d9e75jsn2f2b2f761787";

            // Set the cURL options
            curl_setopt_array($curl, [
                CURLOPT_URL => $url . '?' . http_build_query($params),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: " . $api_host,
                    "X-RapidAPI-Key: " . $api_key
                ],
            ]);
            // Execute the request and fetch the response
            $response = curl_exec($curl);

            // Check for errors
            if ($response === false) {
                return 'Error: ' . curl_error($curl);
            } else {
                // Decode the JSON response
                $data = json_decode($response, true);
                // Prepare HTML response
                $html = '<h2>Actors Born on ' . date('F j', strtotime($birthdate)) . '</h2>';
                if (!empty($data)) {
                    $html .= '<ul>';
                    foreach ($data as $actorId) {
                        $actorDetails = $this->getActorDetails($this->extractId($actorId));
                        if ($actorDetails !== null) {
                            $html .= '<li>' . $actorDetails['name'] . '</li>';
                        }
                    }
                    $html .= '</ul>';
                } else {
                    $html .= '<p>No actors found.</p>';
                }
                // Return HTML response
                return $html;
            }
        }
    }
}
