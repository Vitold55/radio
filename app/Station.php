<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model {

    protected $table = 'stations';
    public $timestamps = false;

    public function getStations() {
        return self::where('available', '=', 1)
            ->orderBy('rating', 'asc')
            ->get()
            ->toArray();
    }

}
