<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    protected $primaryKey='hospital_id';

    public function doctors()
    {
        return $this->hasMany('App\Doctor','hospital_id','hospital_id');
    }
}
