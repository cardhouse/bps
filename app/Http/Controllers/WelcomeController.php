<?php namespace Bubbles\Http\Controllers;

use Bubbles\Services\GoogleCalendar;
use Solution10\Calendar\Calendar;
use Solution10\Calendar\Resolution\MonthResolution;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $calendar = new Calendar(new \DateTime('now'));
        $calendar->setResolution(new MonthResolution());
        $viewData = $calendar->viewData();
        $months = $viewData['contents'];
		return view('welcome', compact('calendar', 'months'));
	}

}
