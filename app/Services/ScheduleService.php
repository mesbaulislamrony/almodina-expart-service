<?php

namespace App\Services;

use Carbon\Carbon;

class ScheduleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAvailableDates()
    {
        $count = 7;
        $datesArray = [];
        $period = \Carbon\CarbonPeriod::create(\Carbon\Carbon::today(), '1 day', \Carbon\Carbon::today()->addDays($count - 1));
        foreach ($period as $date) {
            $datesArray[] = (object) [
                'day' => $date->format('d'),
                'name' => $date->isToday() ? 'Today' : $date->format('D'),
                'date' => $date->format('l M Y'),
            ];
        }

        return $datesArray;
    }

    public function getAvailableHours()
    {
        $startPeriod = Carbon::parse('9:00');
        $endPeriod = Carbon::parse('18:00');
        $period = \Carbon\CarbonPeriod::create($startPeriod, '1 hour', $endPeriod);
        $hours = [];
        foreach ($period as $time) {
            $hours[] = (object) [
                'time' => $time->format('h:i A'),
                'disabled' => $time->lte(Carbon::now()),
                'default' => $time->gte(Carbon::now()) && $time->lt(Carbon::now()->addHour(1)),
            ];
        }

        return $hours;
    }
}
