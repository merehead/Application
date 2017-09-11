<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['blog_title'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreated_atAttribute($value){
        return date('m Y',strtotime($value));
    }
}
