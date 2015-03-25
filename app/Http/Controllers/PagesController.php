<?php namespace Bubbles\Http\Controllers;

use Bubbles\Http\Requests;
use Bubbles\Http\Controllers\Controller;

use Illuminate\Http\Request;

/**
 * Class PagesController
 *
 * @Middleware("auth", only={"dashboard"})
 * @Middleware("guest", only={"appointments"})
 * @package Bubbles\Http\Controllers
 */
class PagesController extends Controller {


    function __construct()
    {
        $this->middleware('auth', ['only' => 'dashboard']);
        $this->middleware('guest', ['only' => 'appointments']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('pages.home');
	}

    /**
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = \Auth::user();
        return view('pages.dashboard', compact('user'));
    }


    /**
     *
     * @return \Illuminate\View\View
     */
    public function appointments()
    {
        return view('appointments.interstitial');
    }

}
