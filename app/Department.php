<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $primaryKey='dept_id';

    public function specialities()
    {
        return $this->hasMany('App\Speciality','dept_id','dept_id');
    }
}
