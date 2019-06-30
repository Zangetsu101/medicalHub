<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    //
    protected $primaryKey='spec_id';

    public function doctors()
    {
        return $this->hasMany('App\Doctor','spec_id','spec_id');
    }

    public function dept()
    {
        return $this->belongsTo('App\Department','dept_id','dept_id');
    }
}
