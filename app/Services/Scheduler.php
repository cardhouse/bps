<?php namespace Bubbles\Services;


use Bubbles\Appointment;
use Carbon\Carbon;

class Scheduler {

    protected $times = [8,10,13];
    protected $days = [1,2,3,5,6];

    public function getAvailable(Carbon $start, $end = 7)
    {
        $list = [];
        $appointments = Appointment::where('time', '>', $start->copy()->addDays($end))->get();
        for($i=0; $i <= $end; $i++)
        {
            foreach($this->times as $time) {
                $start->setTime($time, 00);

                // Skip days shop is closed, and times in the past.
                if( ! in_array($start->dayOfWeek, $this->days) || ! $start->isFuture()) { continue; }

                // Add available appointment if there is an opening
                if( ! $appointments->contains('attributes.time', $start->toDateTimeString()))
                {
                    $list[$start->toDateString()][] = $start->toTimeString();
                }
            }
            $start->addDay();
        }

        return $list;
    }
}