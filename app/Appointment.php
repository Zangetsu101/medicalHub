<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $primaryKey='appt_id';
    public $timestamps=false;

    public function doctor()
    {
        return $this->belongsTo('App\Doctor','doc_id','doc_id');
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Prescription','appt_id','appt_id');
    }

    public function reports()
    {
        return $this->hasMany('App\Report','appt_id','appt_id');
    }
    
    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id','patient_id');
    }
}
