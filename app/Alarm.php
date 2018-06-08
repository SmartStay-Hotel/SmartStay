<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alarm extends Model
{
    protected $fillable = ['guest_id',
        'order_date',
        'day_hour',
        'status'];

    protected $attributes
        = [
            'service_id' => 4,
        ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public static function getAllAlarmOrders()
    {
        $alarms = Alarm::all();
        if (count($alarms) > 0) {
            $serviceName = Services::getServiceName($alarms[0]->service_id);
            foreach ($alarms as $key => $alarm) {
                $alarm->serviceName = $serviceName;
                $alarm->roomNumber  = ($alarm->guest->rooms[0]->number) ? $alarm->guest->rooms[0]->number
                    : 'Alarm id:' . $alarm->id;
            }
        } else {
            $alarm = [];
        }

        return $alarm;
    }
}
