<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    /**
     * Retuning an Array of Formatted Date Range from Given Start and End date by Day of the week.
     *
     * @param string $weekday => "Monday"
     * @param [date] $dateFromString  => 02-02-2020
     * @param [date] $dateToString => 02-02-2020
     * @param string $format
     * @return iterable|object
     */
    public function getWeekDaysInRange($weekday, $dateFromString, $dateToString, $format = 'Y-m-d')
    {
        /** Convert start and end date... */
        $dateFrom = new \DateTime($dateFromString);
        $dateTo = new \DateTime($dateToString);
        $dates = [];
        if ($dateFrom > $dateTo) {
            return $dates;
        }

        if (date('N', strtotime($weekday)) != $dateFrom->format('N')) {
            $dateFrom->modify("next $weekday");
        }

        /** Get Each Day of the week for all Week till the date range */
        while ($dateFrom <= $dateTo) {
            $dates[] = $dateFrom->format($format);
            $dateFrom->modify('+1 week');
        }
        return $dates;
    }

}
