<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCodes extends Model
{

    protected $fillable=['code','amount','frequency'];

    public static function findOrCreate($id)
    {
        $obj = static::find($id);
        return $obj ?: new static;
    }

}
