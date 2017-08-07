<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempUser extends Model
{
    use Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'fname', 'lname', 'nicename', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function meta()
    {
        return $this->hasMany('MetaUser');
    }
}
