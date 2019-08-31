<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //
    protected $primaryKey='prescription_id';
    public $timestamps = false;

    public function appointment()
    {
        return $this->belongsTo('App\Appointment','appt_id','appt_id');
    }

    public function prescribedMedicines()
    {
        return $this->hasMany('App\PrescribedMedicine','prescription_id','prescription_id');
    }

    public function prescribedTests()
    {
        return $this->hasMany('App\PrescribedTest','prescription_id','prescription_id');
    }

    public function symptoms()
    {
        // return $this->hasMany('App\Symptom','')
        return $this->hasManyThrough('App\Symptom','App\PrescriptionSymptom',
                                     'prescription_id','id','prescription_id','symptom_id');
    }
}
