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
            'people_num',
            'status',
        ];

    protected $attributes
        = [
            'service_id' => 7,
        ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public static function getAllEventOrders()
    {
        $events = self::all();
        if (count($events) > 0) {
            $serviceName = Services::getServiceName($events[0]->service_id);
            foreach ($events as $key => $event) {
                $event->serviceName = $serviceName;
                $event->roomNumber  = ($event->guest->rooms[0]->number) ? $event->guest->rooms[0]->number
                    : 'EventErr id:' . $event->id;
            }
        } else {
            $events = [];
        }

        return $events;
    }

    public static function getOrderHistoryByGuest($guestId)
    {
        $events = self::where('guest_id', $guestId)->get();
        if (count($events) > 0) {
            $serviceName = Services::getServiceName($events[0]->service_id);
            foreach ($events as $key => $event) {
                $event->serviceName = $serviceName;
                $event->roomNumber  = ($event->guest->rooms[0]->number) ? $event->guest->rooms[0]->number
                    : 'EventErr id:' . $event->id;
            }
        } else {
            $events = [];
        }

        return $events;
    }

    public static function getNumPeopleOnTheList($id) {
        $events =  self::where('event_type_id', $id)->sum('people_num');

        return $events;
    }
}
