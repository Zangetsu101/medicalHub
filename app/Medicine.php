<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    protected $primaryKey='id';
    public $timestamps = false;

    public function prescription()
    {
        return $this->belongsTo('App\Prescription','prescription_id','prescription_id');
    }

}
