<?php

namespace App\Tasks;

use GuzzleHttp\Client;
use App\Models\Stations;

class StationsParserTask
{
    public function parseStations(array $stationsUrl) {
        $client = new Client();
        $response = $client->get($stationsUrl['url']);

        $body = $response->getBody()->getContents();

        preg_match_all('/data-link=\".*\"/', $body, $ulBlock);

        $rating = 1;

        foreach($ulBlock[0] as $station) {
            preg_match('/http[^\"]*/', $station, $source);

            preg_match('/name=".*[^\"]*/', $station, $fullName);
            preg_match('/[A-ZА-Я][^\-\"|\d|(]*/', $fullName[0], $name);
            preg_match('/\d[^\s|F]*/', $fullName[0], $frequency);
            preg_match('/\(\w*[^\)]*/', $fullName[0], $city);

            $stationSource = $source[0];
            $stationName = trim($name[0]);
            $stationFrequency = !empty($frequency) ? $frequency[0] : null;
            $stationCity = !empty($city) ? substr($city[0], 1) : null;

            if (empty(Stations::where('name', '=', $stationName)->get()->toArray())) {

                $result = Stations::insert([
                    'source' => $stationSource,
                    'name' => $stationName,
                    'frequency' => $stationFrequency,
                    'city' => $stationCity,
                    'rating' => $rating,
                    'country' => $stationsUrl['countryId']
                ]);

                if (isset($result)) {
                    echo "Insert station " . $stationName . "\r\n";
                    $rating++;
                }
            }
        }

        echo "\r\n" . "Finish parsing!" . "\r\n\r\n";
    }
}