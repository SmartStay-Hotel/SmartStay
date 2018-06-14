<?php

namespace App\Events;

use App\Guest;
use App\Services;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewOrderRequest implements ShouldBroadcast
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $serviceName;
    public $guestFullName;
    public $roomNumber;
    public $message;
    public $goToShow;
    public $orderId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($serviceId, $guestId, $orderId)
    {
        $guest               = Guest::find($guestId);
        $this->serviceName   = Services::getServiceName($serviceId);
        $this->guestFullName = $guest->firstname . ' ' . $guest->lastname;
        $this->roomNumber    = Guest::getRoomByGuestId($guestId)->number;
        $this->message       = "{$this->serviceName} from {$this->roomNumber} room";
        $this->goToShow      = "service/{$this->serviceName}/{$orderId}";
        $this->orderId       = $orderId;
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
