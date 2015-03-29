<?php namespace Bubbles\Services;


use Bubbles\Appointment;
use Carbon\Carbon;

class Scheduler {

    protected $times = [8,10,13];

    public function getAvailableForWeek(Carbon $start)
    {
        $appointments = Appointment::all();
        $list = [];
        $days = [1,2,3,5,6];

        for($i=0; $i <= 7; $i++)
        {
            foreach($this->times as $time) {

                $start->setTime($time, 00);

                // Skip days shop is closed, and times in the past.
                if(! in_array($start->dayOfWeek, $days) || ! $start->isFuture())
                {
                    continue;
                }

                if(! $appointments->contains('attributes.time', $start->toDateTimeString()))
                {
                    $list[$start->toFormattedDateString()][] = $start->toTimeString();
                }
            }
            $start->addDay();
        }

        return $list;
    }
}