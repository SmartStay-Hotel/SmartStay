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


    Route::resource('admin/guests', 'GuestController');
    //----Filtro de búsqueda para reservas ------
    Route::get('admin/guests/roomType/{id}/adapted/{disabled_adapted}/jacuzzi/{jacuzzi}', 'GuestController@getAvailableRooms');
    Route::get('admin/guests/roomType/{id}/adapted/{disabled_adapted}', 'GuestController@getAvailableRooms');
    Route::get('admin/guests/roomType/{id}/jacuzzi/{jacuzzi}', 'GuestController@getAvailableRooms');
    Route::get('admin/guests/roomType/{id}', 'GuestController@getAvailableRooms');
    //-------------------------------------------

    Route::resource('admin/alarms', 'AlarmController');
    /*------------ END ADMIN ------------*/


});