<?php namespace Bubbles\Http\Controllers;

use Bubbles\Appointment;
use Bubbles\Dog;
use Bubbles\Http\Requests;
use Bubbles\Http\Controllers\Controller;

use Bubbles\Http\Requests\ScheduleDogsRequest;
use Bubbles\Repositories\AppointmentRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentsController extends Controller {


    /**
     * @var AppointmentRepo
     */
    private $appointmentRepo;

    function __construct(AppointmentRepo $appointmentRepo)
    {
        $this->appointmentRepo = $appointmentRepo;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $date = Carbon::today();
        $appointments = Appointment::all();
        return view('appointments.list', compact('date', 'appointments'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function schedule(ScheduleDogsRequest $request)
    {
        $dogs = [];

        $days = [
            1,2,3,5,6
        ];

        $times = [
            8,
            10,
            13
        ];

        $date = Carbon::today();
        $appointments = Appointment::all();
        $list = [];

        for($i=0; $i <= 7; $i++)
        {
            foreach ($times as $time) {
                $date->setTime($time, 00);

                if(! in_array($date->dayOfWeek, $days) || ! $date->isFuture())
                {
                    continue;
                }

                if(! $appointments->contains('attributes.time', $date->toDateTimeString()))
                {
                    $list[$date->toFormattedDateString()][] = $date->toTimeString();
                }
            }
            $date->addDay();
        }

        foreach ($request->get('dogs') as $dog) {
            $found = Dog::find($dog);
        }

        return view('appointments.list')
                    ->with('dog', $found)
                    ->with('available', $list)
                    ->with('appointments', $appointments);
    }

    /**
     * @return Appointment
     */
    public function create($time, $dog_id)
    {
        $dog = Dog::find($dog_id);
        $dt = Carbon::parse($time);

        $appointment = new Appointment(['time' => $dt]);

        $dog->appointments()->save($appointment);

        return redirect('dashboard');

    }

    /*public function viewWeek(Carbon $start = null)
    {
        $booked = $this->appointmentRepo->getWeek($date);
        $available = array();

        $date = (isset($start)) ? $start : Carbon::today();

        return $booked;

        //return $date;

    }*/

}
