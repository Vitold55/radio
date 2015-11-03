<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class StationsParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:stations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse radio stations streams';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->parseStations();
    }

    private function parseStations() {
        $client = new Client();
        $response = $client->get("http://lovi.fm/category/76/");

        $body = $response->getBody()->getContents();

        preg_match_all('/data-link=\".*\"/', $body, $ulBlock);

        foreach($ulBlock[0] as $station) {
            preg_match('/http[^\"]*/', $station, $source);

            preg_match('/name=".*[^\"]*/', $station, $fullName);
            preg_match('/[A-ZА-Я][^\-\"|\d|(]*/', $fullName[0], $name);
            preg_match('/\d[^\s]*/', $fullName[0], $frequency);
            preg_match('/\(\w*[^\)]*/', $fullName[0], $city);

            $stationSource = $source[0];
            $stationName = trim($name[0]);
            $stationFrequency = !empty($frequency) ? $frequency[0] : null;
            $stationCity = !empty($city) ? substr($city[0], 1) : null;
        }
    }
}
