<?php

namespace App\Service;

use DateTime;

class DateService {

    public function getTimestamp(DateTime $dateTime): string {
        $dateTime = $dateTime->getTimestamp();
        return number_format($dateTime,'0','','') .'000';
    }
}
