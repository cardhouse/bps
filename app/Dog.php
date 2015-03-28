<?php namespace Bubbles;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model {

	protected $fillable = [
        'name',
        'size',
        'breed'
    ];

    public function owner()
    {
        return $this->belongsTo('Bubbles\User');
    }

    public function appointments()
    {
        return $this->hasMany('Bubbles\Appointment');
    }

    public function hasUpcomingAppointment()
    {
        return $this->appointments->where('time', '>', Carbon::now());
    }

    public function getNextAppointment()
    {
        return $this->appointments()->where('time', '>', Carbon::now())->first();
    }

}
