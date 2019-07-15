<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //
    protected $primaryKey='prescription_id';

    public function appointment()
    {
        return $this->belongsTo('App\Appointment','appt_id','appt_id');
    }
}
