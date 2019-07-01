<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
       'patient_id', 'name', 'email', 'mobile', 'dob', 'gender'
    ];
    protected $primaryKey='patient_id';
}
