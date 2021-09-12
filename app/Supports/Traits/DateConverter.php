<?php

namespace App\Supports\Traits;

use Illuminate\Support\Carbon;

/**
 * Date Converter Train Handler
 */
trait DateConvertor
{

    /**
     * isoToUTCFormat => convert ISOString to UTC date format
     *
     ** 2019-10-09T18:30:00.000Z => 2019-10-09 18:30:00.0 UTC (+00:00)
     *
     * @param  mixed $date => ISO String Date Format
     *
     * @return void
     */
    protected function isoToUTCFormat($date)
    {

        $gameStart = Carbon::parse($date, env('APP_TIMEZONE'));  // , 'UTC'
        $gameStart = new Carbon($gameStart->toDateTimeString());
        return $gameStart;
    }

    /**
     * getCurrentDateUTC => get Current date in UTC format
     *
     * @return void
     */
    protected function getCurrentDateUTC()
    {
        $date = \Carbon\Carbon::now();
        $date = $date->toDateTimeString();
        return $date;
    }

    /**
     * get All Weeks Dates From Date Range function
     *
     * @param [type] $startDate
     * @param [type] $endDate
     * @param string $format
     * @return void
     */
    public function getAllWeeksDatesFromDateRange($startDate, $endDate, $format = 'Y-m-d')
    {
        $dateRangeArray = \Carbon\CarbonPeriod::create($startDate, $endDate)->toArray();
        foreach ($dateRangeArray as $carbonObj) {
            $allDates[] = $carbonObj->format($format);
        }
        $allDates = array_chunk($allDates, 7);
        return $allDates;
    }
}
