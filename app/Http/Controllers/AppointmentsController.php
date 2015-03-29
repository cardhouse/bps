<?php namespace Bubbles\Http\Controllers;

use Bubbles\Appointment;
use Bubbles\Dog;
use Bubbles\Http\Requests;
use Bubbles\Http\Controllers\Controller;

use Bubbles\Http\Requests\ScheduleDogsRequest;
use Bubbles\Repositories\AppointmentRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Bubbles\Services\Scheduler as Scheduler;

class AppointmentsController extends Controller {

    protected $scheduler;

    /**
     * @var AppointmentRepo
     */
    private $appointmentRepo;

    function __construct(AppointmentRepo $appointmentRepo, Scheduler $scheduler)
    {
        $this->appointmentRepo = $appointmentRepo;
        $this->scheduler = $scheduler;
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
    public function schedule(ScheduleDogsRequest $request, $weeks = 0)
    {

        $date = Carbon::today()->addWeeks($weeks);
        $available = $this->scheduler->getAvailableForWeek($date);

        foreach ($request->get('dogs') as $dog) {
            $found = Dog::find($dog);
        }

        return view('appointments.list')
                    ->with('dog', $found)
                    ->with('available', $available);
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
