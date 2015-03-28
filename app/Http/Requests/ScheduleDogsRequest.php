<?php namespace Bubbles\Http\Requests;

use Bubbles\Http\Requests\Request;

class ScheduleDogsRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dogs' => 'array|required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'You must select at least one dog'
        ];
    }

}
