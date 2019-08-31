<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $primaryKey='rating_id';
    public $timestamps=false;

    public function ofUser()
    {
        return $this->belongsTo('App\User','of_user','id');
    }

    public function byUser()
    {
        return $this->belongsTo('App\User','by_user','id');
    }

    public function getAppointment()
    {
        return $this->belongsTo('App\Appointment','appt_id','appt_id');
    }
}
