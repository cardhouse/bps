<?php namespace Bubbles\Http\Controllers;

use Bubbles\Dog;
use Bubbles\Http\Requests;
use Bubbles\Http\Controllers\Controller;

use Bubbles\Http\Requests\AddDogRequest;
use Illuminate\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DogsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('dogs.create');
	}

	/**
	 * Save a user's dog and redirect them
     * back to the dashboard.
     *
     * Validates against AddDogRequest
	 *
	 * @return Response
	 */
	public function store(AddDogRequest $request)
	{
        \Auth::user()->dogs()->create($request->all());

        return redirect('dashboard');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
