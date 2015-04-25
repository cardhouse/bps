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
use Illuminate\Support\Facades\Session;

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
     * @param Request $request
     * @return array
     */
    public function schedule(ScheduleDogsRequest $request)
    {
        session(['dog' => Dog::find($request->get('dog'))]);
        return redirect('/appointments/schedule');
    }

    /**
     * @return Appointment
     */
    public function create($time)
    {
        $dog = session('dog');
        $dt = Carbon::parse($time);

        $appointment = new Appointment(['time' => $dt]);
        $dog->appointments()->save($appointment);
        Session::forget('dog');

        return redirect('dashboard');

    }

    /**
     * Show a list of available appointments for the week
     *
     * @param int $weeks
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function viewWeek($weeks = 0)
    {
        // No dog set, redirect to the dashboard
        if( ! Session::has('dog')) {
            return redirect('dashboard');
        }

        $date = Carbon::today()->addWeeks($weeks);

        return view('appointments.list')
            ->with('dog', session('dog'))
            ->with('available', $this->scheduler->getAvailable($date))
            ->with('week', $weeks)
        ;

    }


    /**
     * Cancel making an appointment for a dog and redirect to dashboard
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forgetAppointment(){
        Session::forget('dog');
        return redirect('dashboard');
    }

    public function cancel($appointment)
    {
        return view('appointments.cancel')->with('id', $appointment);
    }

    public function delete($id)
    {
        Appointment::destroy($id);

        return redirect('dashboard');
    }
}
