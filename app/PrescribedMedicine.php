<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescribedMedicine extends Model
{
    //
    protected $table='pres_medicines';
    protected $primaryKey='id';
    public $timestamps = false;

    public function prescription()
    {
        return $this->belongsTo('App\Prescription','prescription_id','prescription_id');
    }

    public function medicine()
    {
        return $this->hasOne('App\Medicine','id','medicine_id');
    }

}
