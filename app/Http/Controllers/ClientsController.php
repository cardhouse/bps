<?php namespace Bubbles\Http\Controllers;

use Bubbles\Http\Requests;

use Bubbles\Repositories\UserRepo;
use Bubbles\User;

class ClientsController extends Controller {

    protected $userRepo;

    function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;

        $this->middleware('auth'); // Make Admin permissions necessary
    }

    public function show($name)
    {
        $user = $this->userRepo->findByLastName($name);
        return view('pages.dashboard', compact('user'));
	}

    public function index()
    {
        $clients = User::all()->lists('last_name');

        return view('clients.index', compact('clients'));
    }

}
