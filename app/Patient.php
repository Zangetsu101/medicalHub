<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
       'patient_id', 'name', 'email', 'mobile', 'dob', 'gender'
    ];
    protected $primaryKey='patient_id';
    public $timestamps=false;

    public function prescriptions()
    {
        return $this->hasManyThrough('App\Prescription','App\Appointment','patient_id','appt_id',
                                     'patient_id','appt_id');
    }
}
