<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $primaryKey='doc_id';
    public $timestamps=false;

    public function spec()
    {
        return $this->belongsTo('App\Speciality','spec_id','spec_id');
    }

    public function hospital()
    {
        return $this->belongsTo('App\Hospital','hospital_id','hospital_id');
    }
}
