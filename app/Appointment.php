<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $primaryKey='appt_id';
<<<<<<< HEAD
    public $timestamps=false;

    public function doctor()
    {
        return $this->belongsTo('App\Doctor','doc_id','doc_id');
    }
=======

    

>>>>>>> e12f5c71d26c1d4e3543093b2ace0f4fbe9bb711
}
