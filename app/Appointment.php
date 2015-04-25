<?php namespace Bubbles;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model {

    protected $fillable = ['time'];

    protected $dates = ['time'];

    public function dog()
    {
        return $this->belongsTo('Bubbles\Dog');
	}

}
