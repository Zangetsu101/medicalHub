<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $primaryKey='hospital_id';
    public $timestamps=false;

    public function doctors()
    {
        return $this->hasMany('App\Doctor','hospital_id','hospital_id');
    }
}
