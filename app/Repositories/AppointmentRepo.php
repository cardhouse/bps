<?php namespace Bubbles\Repositories;


use Bubbles\Appointment;
use Carbon\Carbon;

class AppointmentRepo {

    public function getWeek(Carbon $dt)
    {
        $foo = Appointment::whereBetween('time', [$dt->toDateTimeString(),$dt->addWeek()->toDateTimeString()])->get();

        return $foo;
    }
}