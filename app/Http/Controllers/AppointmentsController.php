<?php namespace Bubbles\Http\Controllers;

use Bubbles\Appointment;
use Bubbles\Dog;
use Bubbles\Http\Requests;
use Bubbles\Http\Controllers\Controller;

use Bubbles\Repositories\AppointmentRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentsController extends Controller {


    /**
     * @var AppointmentRepo
     */
    private $appointmentRepo;

    function __construct(AppointmentRepo $appointmentRepo)
    {
        $this->middleware('guest', ['only' => 'index']);
        $this->appointmentRepo = $appointmentRepo;
    }

    public function index()
    {
        return view('appointments.index');
	}

    public function show()
    {
        $date = Carbon::today();
        $appointments = Appointment::all();
        return view('appointments.list', compact('date', 'appointments'));
    }

    public function create()
    {
        $dog = Dog::find(1);
        $dt = Carbon::today();
        $dt->addDay()->hour(8);

        $appointment = new Appointment(['time' => $dt]);

        $dog->appointments()->save($appointment);

        return $appointment;

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
