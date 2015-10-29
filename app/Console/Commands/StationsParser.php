<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Guzzle\Http\Client;

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
        $request = $client->get("http://lovi.fm/category/76/");
        $response = $request->send();

        $body = $response->getBody();
        echo $body;
    }
}
