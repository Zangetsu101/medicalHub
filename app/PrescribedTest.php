<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescribedTest extends Model
{
    //
    protected $table='presTest';
    public $timestamps=false;

    public function test()
    {
        return $this->hasOne('App\Test','id','test_id');
    }
}
