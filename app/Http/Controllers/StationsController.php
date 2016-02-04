<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Stations;

class StationsController extends BaseController
{
    public function index() {

        $stations = Stations::where('available', '=', 1)
            ->orderBy('id', 'asc')
            ->get()
            ->toArray();

        return view('stations.index', [
            'stations' => $stations,
        ]);
    }

    public function player() {
        return view('stations.player');
    }

}
