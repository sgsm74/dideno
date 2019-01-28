<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewPay
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user, $event, $cash;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $event, $cash)
    {
        //
        $this->user = $user;
        $this->event = $event;
        $this->cash = $cash;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
