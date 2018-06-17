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

    public function spaTreatmentType()
    {
        return $this->belongsTo(SpaTreatmentType::class, 'treatment_type_id');
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
        $spaAppointments = self::all();
        if (count($spaAppointments) > 0) {
            $serviceName = Services::getServiceName($spaAppointments[0]->service_id);
            foreach ($spaAppointments as $key => $spaAppointment) {
                $spaAppointment->serviceName = $serviceName;
                $spaAppointment->roomNumber  = ($spaAppointment->guest->rooms[0]->number) ? $spaAppointment->guest->rooms[0]->number
                    : 'SpaErr Appointment id:' . $spaAppointment->id;
            }
        } else {
            $spaAppointments = [];
        }

        return $spaAppointments;
    }

    public static function getOrderHistoryByGuest($guestId)
    {
        $spaAppointments = self::where('guest_id', $guestId)->get();
        if (count($spaAppointments) > 0) {
            $serviceName = Services::getServiceName($spaAppointments[0]->service_id);
            foreach ($spaAppointments as $key => $spaAppointment) {
                dd($spaAppointment->spaTreatmentType->name);
                $spaAppointment->spaTypeName = $spaAppointment->spaTreatmentType->name;
                $spaAppointment->serviceName = $serviceName;
                $spaAppointment->roomNumber  = ($spaAppointment->guest->rooms[0]->number) ? $spaAppointment->guest->rooms[0]->number
                    : 'SpaErr Appointment id:' . $spaAppointment->id;
            }
        } else {
            $spaAppointments = [];
        }

        return $spaAppointments;
    }
}
