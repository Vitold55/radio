<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Tasks\StationsParserTask;

class StationsParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:stations';

    protected $stationsUrl = [
        'ukr' => [
            'url' => "http://lovi.fm/category/76/",
            'countryId' => 1
        ],
        'rus' => [
            'url' => "http://lovi.fm/category/68/",
            'countryId' => 2
        ],
    ];

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
     */
    public function handle()
    {
        try {
            $parserTask = new StationsParserTask();
            $parserTask->parseStations($this->stationsUrl['ukr']);
        }
        catch (\Exception $e) {
            echo $e->getTrace();
        }
    }
}
