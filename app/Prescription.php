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

    public function medicines()
    {
        return $this->hasMany('App\Medicine','prescription_id','prescription_id');
    }

    public function reports()
    {
        return $this->hasMany('App\Report','prescription_id','prescription_id');
    }
}
