<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 11/6/18
 * Time: 12:47
 */

namespace App\Http\Controllers;


use App\EventType;
use App\Services;
use App\TripType;
use Dedicated\GoogleTranslate\Translator;

class TranslatorAppController extends Controller
{

    /**
     * @param null $array
     * @param null $string
     *
     * @return null
     * @throws \Dedicated\GoogleTranslate\TranslateException
     */
    public static function translate($array = null, $string = null)
    {
        $translator = new Translator();
        $result     = '';
        $locale     = app()->getLocale();
        if ($array != null) {
            $result = $translator->setSourceLang('en')
                ->setTargetLang('it')
                ->translate($array->toJson());
        } elseif ($string != null) {
            $result = $translator->setSourceLang('en')
                ->setTargetLang($locale)
                ->translate($string);
        }

        return $result;
    }

    /**
     * @return mixed
     * @throws \Dedicated\GoogleTranslate\TranslateException
     */
    public function services()
    {
        //no va 'ca'
        if (app()->getLocale() != 'en') {
            $data = Services::get(['name', 'description']);
            $data = self::translate($data);
            $data = htmlspecialchars_decode($data);
            $data = json_decode($data, true);
            if ($data == null) {
                return Services::get();
            }
            $trans = [];
            foreach ($data as $k => $v) {
                $values = [];
                foreach ($v as $key => $field) {
                    $values[] = $v[$key];

                }
                $trans[] = $values;
            }
            $services = Services::get();
            foreach ($services as $key => $service) {
                $service->name        = $trans[$key][0];
                $service->description = $trans[$key][1];
            }
        } else {
            $services = Services::get();
        }

        return $services;
    }

    /**
     * @return mixed
     * @throws \Dedicated\GoogleTranslate\TranslateException
     */
    public function trips()
    {
        //no va 'es'
        if (app()->getLocale() != 'en') {
            $data = TripType::get(['name', 'location', 'day_week']);
            $data = self::translate($data);
            $data = htmlspecialchars_decode($data);
            $data = json_decode($data, true);
            if ($data == null) {
                return TripType::get();
            }
            $trans = [];
            foreach ($data as $k => $v) {
                $values = [];
                foreach ($v as $key => $field) {
                    $values[] = $v[$key];

                }
                $trans[] = $values;
            }
            $trips = TripType::get();
            foreach ($trips as $key => $service) {
                $service->name     = $trans[$key][0];
                $service->location = $trans[$key][1];
                $service->day_week = $trans[$key][1];
            }
        } else {
            $trips = TripType::get();
        }

        return $trips;
    }

    /**
     * @return mixed
     * @throws \Dedicated\GoogleTranslate\TranslateException
     */
    public function events()
    {
        dd(EventType::get());
        if (app()->getLocale() != 'en') {
            $data = EventType::get(['name', 'location', 'day_week']);
            $data = self::translate($data);
            $data = htmlspecialchars_decode($data);
            $data = json_decode($data, true);
            if ($data == null) {
                return EventType::get();
            }
            $trans = [];
            foreach ($data as $k => $v) {
                $values = [];
                foreach ($v as $key => $field) {
                    $values[] = $v[$key];

                }
                $trans[] = $values;
            }
            $events = EventType::get();
            foreach ($events as $key => $service) {
                $service->name     = $trans[$key][0];
                $service->location = $trans[$key][1];
                $service->day_week = $trans[$key][1];
            }
        } else {
            $events = EventType::get();
        }

        return $events;
    }

}