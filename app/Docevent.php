<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docevent extends Model
{
    //
    protected $primaryKey='doc_id';
    public $timestamps = false;

    public function doctor()
    {
        return $this->belongsTo('App\Doctor','doc_id','doc_id');
    }

}
