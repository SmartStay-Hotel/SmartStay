<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Housekeeping extends Model
{

    protected $fillable
        = [
            'guest_id',
            'order_date',
            'bed_sheets',
            'cleaning',
            'minibar',
            'blanket',
            'toiletries',
            'pillow',
        ];

    protected $attributes
        = [
            'service_id' => 9,
        ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    /**
     * @return \___PHPSTORM_HELPERS\static|array|mixed
     */
    public static function getAllHousekeepingOrders()
    {
        $housekeepings = self::all();
        if (count($housekeepings) > 0) {
            $serviceName = Services::getServiceName($housekeepings[0]->service_id);
            foreach ($housekeepings as $key => $housekeeping) {
                $housekeeping->serviceName = $serviceName;
                $housekeeping->roomNumber  = ($housekeeping->guest->rooms[0]->number)
                    ? $housekeeping->guest->rooms[0]->number
                    : 'HousekeepingErr id:' . $housekeeping->id;
            }
        } else {
            $housekeepings = [];
        }

        return $housekeepings;
    }

    public static function getOrderHistoryByGuest($guestId)
    {
        $housekeepings = self::where('guest_id', $guestId)->get();
        if (count($housekeepings) > 0) {
            $serviceName = Services::getServiceName($housekeepings[0]->service_id);
            foreach ($housekeepings as $key => $housekeeping) {
                $housekeeping->serviceName = $serviceName;
                $housekeeping->roomNumber  = ($housekeeping->guest->rooms[0]->number)
                    ? $housekeeping->guest->rooms[0]->number
                    : 'HousekeepingErr id:' . $housekeeping->id;
            }
        } else {
            $housekeepings = [];
        }

        return $housekeepings;
    }
}
