<?php

namespace App\Traits;

trait CustomDB {

    static public function getNextTableId($tablename) {
        $result = \DB::select(\DB::raw("SHOW TABLE STATUS WHERE name='" . $tablename . "'"));

        if (!empty($result)) {
            return $result[0]->Auto_increment;
        } else {
            return false;
        }
    }

}