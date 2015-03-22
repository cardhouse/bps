<?php namespace Bubbles;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model {

    protected $fillable = ['time'];

    public function dog()
    {
        return $this->belongsTo('Bubbles\Dog');
	}

}
