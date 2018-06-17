<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 11/6/18
 * Time: 12:47
 */

namespace App\Http\Controllers;


use App\EventType;
use App\ProductType;
use App\Services;
use App\SpaTreatmentType;
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
                ->setTargetLang($locale)
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
        if (app()->getLocale() != 'en') {
            $name = Services::pluck('name');
            $name = self::translate($name);
            $name = htmlspecialchars_decode($name);

            $description = Services::pluck('description');
            $description = self::translate($description);
            $description = htmlspecialchars_decode($description);
            if (app()->getLocale() == 'es') {
                $description = str_replace('" "', '"', $description);
            } elseif (app()->getLocale() == 'cat') {
                $description = str_replace('""', '","', $description);
            }

            $name        = json_decode($name, true);
            $description = json_decode($description, true);

            if ($name == null || $description == null) {
                return Services::get();
            }

            $services = Services::get();
            foreach ($services as $key => $service) {
                $service->name        = $name[$key];
                $service->description = $description[$key];
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
        if (app()->getLocale() != 'en') {
            $name = TripType::pluck('name');
            $name = self::translate($name);
            $name = htmlspecialchars_decode($name);

            $location = TripType::pluck('location');
            $location = self::translate($location);
            $location = htmlspecialchars_decode($location);

            $day = TripType::pluck('day_week');
            $day = self::translate($day);
            $day = htmlspecialchars_decode($day);

            $name = json_decode($name, true);
            $location = json_decode($location, true);
            $day = json_decode($day, true);
            if ($name == null || $location == null || $day == null) {
                return TripType::get();
            }

            $trips = TripType::get();
            foreach ($trips as $key => $trip) {
                $trip->name     = $name[$key];
                $trip->location = $location[$key];
                $trip->day_week = $day[$key];
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
        if (app()->getLocale() != 'en') {
            $name = EventType::pluck('name');
            $name = self::translate($name);
            $name = htmlspecialchars_decode($name);

            $location = EventType::pluck('location');
            $location = self::translate($location);
            $location = htmlspecialchars_decode($location);

            $day = EventType::pluck('day_week');
            $day = self::translate($day);
            $day = htmlspecialchars_decode($day);

            $name = json_decode($name, true);
            $location = json_decode($location, true);
            $day = json_decode($day, true);
            if ($name == null || $location == null || $day == null) {
                return EventType::get();
            }

            $events = EventType::get();
            foreach ($events as $key => $event) {
                $event->name     = $name[$key];
                $event->location = $location[$key];
                $event->day_week = $day[$key];
            }
        } else {
            $events = EventType::get();
        }

        return $events;
    }

    /**
     * @return mixed
     * @throws \Dedicated\GoogleTranslate\TranslateException
     */
    public function spas()
    {
        if (app()->getLocale() != 'en') {
            $name = SpaTreatmentType::pluck('name');
            $name = self::translate($name);
            $name = htmlspecialchars_decode($name);

            $name = json_decode($name, true);
            if ($name == null) {
                return SpaTreatmentType::get();
            }

            $spas = SpaTreatmentType::get();
            foreach ($spas as $key => $spa) {
                $spa->name = $name[$key];
            }
        } else {
            $spas = SpaTreatmentType::get();
        }

        return $spas;
    }

    /**
     * @return mixed
     * @throws \Dedicated\GoogleTranslate\TranslateException
     */
    public function products()
    {
        if (app()->getLocale() != 'en') {
            $name = ProductType::pluck('name');
            $name = self::translate($name);
            $name = htmlspecialchars_decode($name);
            $name = str_replace(['\\ u00c9X', '\\ u00ae', '\\"', '\\ "', '\\ u00e' , 'A"'], '', $name);
            $name = str_replace(['ACQU ,'], 'ACQU",', $name);
            $name = str_replace(['" MAHOU "'], ' MAHOU', $name);
            $name = json_decode($name, true);
            if ($name == null) {
                return ProductType::get();
            }
            $products = ProductType::get();
            foreach ($products as $key => $product) {
                $product->name = $name[$key];
            }
        } else {
            $products = ProductType::get();
        }

        return $products;
    }

}