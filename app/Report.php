<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $primaryKey='report_id';

    public function appointment()
    {
        return $this->belongsTo('App\Appointment','appt_id','appt_id');
    }
}
