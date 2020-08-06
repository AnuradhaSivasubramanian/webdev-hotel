<?php

namespace App\Service;

class CalculateYearsOpened
{

    public function calculateYears($year)
    {

        $yearsOpened = date("Y");
        $diff = $yearsOpened - $year;
        return $diff;
    }
}