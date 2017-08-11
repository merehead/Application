<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['name'];


    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
