<?php

namespace App\Events;

use App\Booking;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BookingCompletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        //Analyze for bonuses;
        $carer = $booking->bookingCarer()->first();
        if($carer->referral_code === null){
           //Create bonus for first booking, if has not yet
            if(!$carer->bonuses()->where('bonus_type_id', 1)->get()->count()){
                $carer->bonuses()->create([
                   'bonus_type_id' => 1,
                   'amount' => 50,
                ]);

                //todo payment to stripe
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
