<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 11/6/18
 * Time: 12:47
 */

namespace App\Http\Controllers;


use App\Services;
use Dedicated\GoogleTranslate\Translator;

class TranslatorAppController extends controller
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
            $data = Services::get(['name', 'description']);
            $data = self::translate($data);
            $data = htmlspecialchars_decode($data);
            $data = json_decode($data, true);
            if ($data == null){
                return Services::get();
            }
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

}