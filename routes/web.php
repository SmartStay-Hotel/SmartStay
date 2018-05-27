<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::group(['middleware' => 'language'], function () {
    /*------------ LANGUAGES ------------*/
    Route::get('language/{lang}', function ($lang) {
        Session::put('locale', $lang);

        return redirect()->back();
    });

    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

    Route::group(['prefix' => 'admin'], function () {
        //Route::auth();
        Auth::routes();
    });


    /*------------ GUEST ------------*/
    Route::get('dashboard', function () {
        return redirect('/');
    });
    Route::get('/', function () {
        if (Session::has('guest_id')) {
            $services = \App\Services::where('is_active', 1)->get();
            return view('guest.dashboard', compact('services'));
        } else {
            return view('loginGuest');
        }
    });

    Route::get('logout', 'CodeController@logout');
    Route::get('services', function(){
        $services =\App\Services::get();
        return $services;
    });

    Route::post('/', 'CodeController@login');
    /*------------ END GUEST ------------*/


    /*------------ ADMIN ------------*/
    Route::get('admin', function () {
        return redirect('admin/dashboard');
    });
    Route::get('admin/dashboard', 'HomeController@index')->name('admin');


    Route::get('admin/checkinform', function () {
        return view('admin.checkinform');
    });

    Route::get('admin/payments', function () {
        return view('admin.payments');
    });

    /* llamadas a las vistas - luego irán en los controllers */
    Route::get('admin/taxi', function () {
        return view('admin.taxi');
    });

    Route::get('admin/spa', function () {
        return view('admin.spa');
    });

    Route::get('admin/restaurant', function () {
        return view('admin.restaurant');
    });

    Route::get('admin/housekeeping', function () {
        return view('admin.housekeeping');
    });

    Route::get('admin/petCare', function () {
        return view('admin.petCare');
    });

    Route::get('admin/snacks', function () {
        return view('admin.snacks');
    });

    Route::get('admin/events', function () {
        return view('admin.events');
    });

    Route::get('admin/trips', function () {
        return view('admin.trips');
    });

    /* end llamadas a las vistas */

    Route::resource('admin/guests', 'GuestController');
    Route::resource('admin/alarms', 'AlarmController');
    /*------------ END ADMIN ------------*/


});