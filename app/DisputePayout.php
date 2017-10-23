<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisputePayout extends Model
{
    protected $fillable = [
        'appointment_id',
        'details_of_dispute',
        'details_of_dispute_resolution',
        'status',
    ];

    /**
     * Relations
     */
    public function appointment(){
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
