<?php namespace Bubbles;

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

}
