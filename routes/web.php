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
    Route::get('trips', function(){
        $trips =\App\Trip_types::get();
        return $trips;
    });
    Route::get('events', function(){
        $events =\App\Event::get();
        return $events;
    });
    Route::get('/logout', 'CodeController@logout');


    Route::post('/', 'CodeController@login');
    //Route::get('/login', 'CodeController@login');

    /*Route::get('dashboard', function () {
        $services = \App\Services::all();

        return view('guest.dashboard', compact('services'));
    });*/
    /*------------ END GUEST ------------*/


    /*------------ ADMIN ------------*/
    Route::get('admin', 'HomeController@index')->name('admin');
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('admin/checkin', 'AdminDashboardController@checkin');

    Route::get('admin/checkout', 'AdminDashboardController@checkout');

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
    //----Filtro de búsqueda para reservas ------
    Route::get('admin/guests/roomType/{id}/adapted/{disabled_adapted}/jacuzzi/{jacuzzi}', 'GuestController@getAvailableRooms');
    Route::get('admin/guests/roomType/{id}/adapted/{disabled_adapted}', 'GuestController@getAvailableRooms');
    Route::get('admin/guests/roomType/{id}/jacuzzi/{jacuzzi}', 'GuestController@getAvailableRooms');
    Route::get('admin/guests/roomType/{id}', 'GuestController@getAvailableRooms');
    //-------------------------------------------

    Route::resource('admin/alarms', 'AlarmController');
    /*------------ END ADMIN ------------*/


    /*------------- SERVICES --------------*/
    Route::resource('service/taxi', 'TaxiController');
    Route::resource('service/housekeeping', 'HousekeepingController');
    Route::resource('service/restaurant', 'RestaurantController');
    Route::resource('service/trip', 'TripController');
    Route::resource('service/event', 'EventController');
});