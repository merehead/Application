<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailError extends Model
{
    protected $fillable = ['error_message','function','action','user_id'];

}
