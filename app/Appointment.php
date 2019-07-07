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
}
