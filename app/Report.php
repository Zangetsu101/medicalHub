<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $primaryKey='report_id';
    public $timestamps = false;

    public function prescription()
    {
        return $this->belongsTo('App\Prescription','appt_id','appt_id');
    }
}
