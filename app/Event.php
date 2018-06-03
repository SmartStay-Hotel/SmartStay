<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable
        = [
            'guest_id',
            'event_type_id',
            'order_date',
            'status',
        ];

    public function eventTypes()
    {
        return $this->belongsTo('App\Event_types');
    }
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    protected $attributes
        = [
            'service_id' => 8,
        ];

    public static function getAllEventOrders()
    {
        $events = Event::all();
        if (count($events) > 0) {
            $serviceName = Services::getServiceName($events[0]->service_id);
            foreach ($events as $key => $event) {
                $event->serviceName = $serviceName;
                $event->roomNumber = ($event->guest->rooms[0]->number) ? $event->guest->rooms[0]->number
                    : 'Event id:' . $event->id;
            }
        } else {
            $event = [];
        }

        return $event;
    }
}
