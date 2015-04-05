<?php namespace Bubbles\Http\Controllers;

use Bubbles\Http\Requests;

use Bubbles\Repositories\UserRepo;

class ClientsController extends Controller {

    protected $userRepo;

    function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;

        $this->middleware('auth'); // Make Admin permissions necessary
    }

    public function show($name)
    {
        $view = view('auth.login')->renderSections();
        dd(join($view, ''));
        $user = $this->userRepo->findByLastName($name);
        return view('pages.dashboard', compact('user'));
	}

}
