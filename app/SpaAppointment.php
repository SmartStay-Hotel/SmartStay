<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaAppointment extends Model
{
    protected $fillable = ['guest_id',
        'treatment_type_id',
        'day_hour',
        'order_date',
        'price',
        'status'];

    protected $attributes
        = [
            'service_id' => 3,
        ];

    public function spaType()
    {
        return $this->belongsTo(SpaType::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    /**
     * @return \___PHPSTORM_HELPERS\static|array|mixed
     */
    public static function getAllSpaAppointmentOrders()
    {
        $spaAppointments = SpaAppointment::all();
        if (count($spaAppointments) > 0) {
            $serviceName = Services::getServiceName($spaAppointments[0]->service_id);
            foreach ($spaAppointments as $key => $spaAppointment) {
                $spaAppointment->serviceName = $serviceName;
                $spaAppointment->roomNumber  = ($spaAppointment->guest->rooms[0]->number) ? $spaAppointment->guest->rooms[0]->number
                    : 'Spa Appointment id:' . $spaAppointment->id;
            }
        } else {
            $spaAppointments = [];
        }

        return $spaAppointments;
    }
}
