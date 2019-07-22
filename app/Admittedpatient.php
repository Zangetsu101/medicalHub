<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admittedpatient extends Model
{
    //
    protected $primaryKey='patient_id';

    public function doctor()
    {
        return $this->belongsTo('App\Doctor','doc_id','doc_id');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient','patient_id','patient_id');
    }
}
