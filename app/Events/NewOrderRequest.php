<?php

namespace App\Events;

use App\Guest;
use App\Restaurant;
use App\Services;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewOrderRequest implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $serviceName;
    public $roomNumber;
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($serviceId, $guestId)
    {
        $this->serviceName = Services::getServiceName($serviceId);
        $this->roomNumber = Guest::getRoomByGuestId($guestId)->number;
        $this->message = "New order: {$this->serviceName} from {$this->roomNumber} room";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['smartstay-services'];
    }
}
