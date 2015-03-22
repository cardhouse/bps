<?php namespace Bubbles\Http\Requests;

use Bubbles\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class AddDogRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name' => 'required',
            'breed' => 'required',
            'size' => 'required'
		];
	}

}
