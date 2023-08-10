<?php

namespace App\Helpers;

use Carbon\Carbon;

class Docnumber
{
    /**
     * create new document number by custom user
     */
    public static function createDocnum ($prefix, $oldnum, $max_length=0)
    {
        $numPrefix = strlen($prefix);
        $oldNumber = substr($oldnum, $numPrefix, 3);
        $newNumber = $oldNumber + 1;
        $docnum = $prefix . sprintf("%03d", $newNumber);
        $monthYear = date('mY', strtotime(Carbon::now()));
        $newDocNum = $docnum . $monthYear;
        return $newDocNum;
    }
}
