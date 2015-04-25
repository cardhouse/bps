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
    }

    /**
     * Display the home page
     *
     * route: /
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('pages.home');
	}

    /**
     * Display the authenticated user's dashboard
     * Or redirect to login page
     *
     * route: /dashboard
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = \Auth::user();
        return view('pages.dashboard', compact('user'));
    }


    /**
     * Display the interstitial appointment page
     * if there is no current authenticated user.
     * If authenticated, it redirects to the dashboard
     *
     * route: appointments
     *
     * @return \Illuminate\View\View
     */
    public function appointments()
    {
        return view('appointments.interstitial');
    }

}
