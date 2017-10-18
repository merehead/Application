<?php

namespace App\Events;

use App\Appointment;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AppointmentCompletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        
        //Analyze for bonuses;
        $booking = $appointment->booking()->first();
        $users = [];
        $users[] = $booking->bookingCarer()->first();
        $users[] = $booking->bookingPurchaser()->first();
        foreach ($users as $user){
            if($user->referral_code !== null){
                if($user->completed_appointments_hours >= 20){
                    $referralUser = User::where('own_referral_code', $user->referral_code)->first();

                    if(!$user->bonuses()->where('bonus_type_id', 2)->where('referral_donor', $referralUser->id)->get()->count()) {
                        $user->bonuses()->create([
                            'bonus_type_id' => 2,
                            'amount' => 100,
                            'referral_donor' => $referralUser->id,
                        ]);

                        if($user->user_type_id == 3){
                            //Carer
                            //todo payment from stripe
                        }
                    }

                    if(!$referralUser->bonuses()->where('bonus_type_id', 2)->where('referral_donor', $user->id)->get()->count()) {
                        $referralUser->bonuses()->create([
                            'bonus_type_id' => 2,
                            'amount' => 100,
                            'referral_donor' => $user->id,
                        ]);
                        if($referralUser->user_type_id == 3){
                            //Carer
                            //todo payment from stripe
                        }
                    }
                }
            }
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
