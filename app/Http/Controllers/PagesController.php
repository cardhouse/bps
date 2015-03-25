<?php namespace Bubbles\Http\Controllers;

use Bubbles\Http\Requests;
use Bubbles\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {


    function __construct()
    {
        $this->middleware('auth', ['only' => 'dashboard']);
    }

    public function home()
    {
        return view('pages.home');
	}

    public function dashboard()
    {
        $user = \Auth::user();
        return view('pages.dashboard', compact('user'));
    }

    public function appointments()
    {
        return view('appointments.interstitial');
    }

}
