<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Station extends Model {

    public $table = 'stations';
    public $timestamps = false;

    public function getStations() {
        return self::where('available', '=', 1)
            ->orderBy('rating', 'asc')
            ->get()
            ->toArray();
    }

    public function getStationsByCategoryAlias($alias) {
        $stationsObjects = \DB::table('categories as c')
            ->where('c.alias', '=', $alias)
            ->where('c.available', '=', 1)
            ->join('stations_to_categories as stc', 'stc.category_id', '=', 'c.id')
            ->join($this->table . ' as s', 'stc.station_id', '=', 's.id')
            ->orderBy('s.rating', 'asc')
            ->select('c.alias', 's.id', 's.name', 's.source', 's.logo')
            ->get();

        $stations = [];
        foreach($stationsObjects as $stationObj) {
            $stations[] = json_decode(json_encode($stationObj), true);
        }

        return $stations;
    }

}
