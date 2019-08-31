<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionSymptom extends Model
{
    //
    protected $table='presSymp';
    public $timestamps=false;

    public function symptom()
    {
        return $this->hasOne('App\Symptom','id','symptom_id');
    }
}
