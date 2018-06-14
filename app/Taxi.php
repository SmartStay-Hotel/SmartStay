<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxi extends Model
{

    protected $fillable
        = [
            'guest_id',
            'order_date',
            'day_hour',
            'status',
        ];

    protected $attributes
        = [
            'service_id' => 8,
        ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    /**
     * @return \___PHPSTORM_HELPERS\static|array|mixed
     */
    public static function getAllTaxiOrders()
    {
        $taxis = self::all();
        if (count($taxis) > 0) {
            $serviceName = Services::getServiceName($taxis[0]->service_id);
            foreach ($taxis as $key => $taxi) {
                $taxi->serviceName = $serviceName;
                $taxi->roomNumber  = ($taxi->guest->rooms[0]->number) ? $taxi->guest->rooms[0]->number
                    : 'Taxi id:' . $taxi->id;
            }
        } else {
            $taxis = [];
        }

        return $taxis;
    }

    public static function getOrderHistoryByGuest($guestId)
    {
        $taxis = self::where('guest_id', $guestId)->get();
        if (count($taxis) > 0) {
            $serviceName = Services::getServiceName($taxis[0]->service_id);
            foreach ($taxis as $key => $taxi) {
                $taxi->serviceName = $serviceName;
                $taxi->roomNumber  = ($taxi->guest->rooms[0]->number) ? $taxi->guest->rooms[0]->number
                    : 'TaxiErr id:' . $taxi->id;
            }
        } else {
            $taxis = [];
        }

        return $taxis;
    }
}
