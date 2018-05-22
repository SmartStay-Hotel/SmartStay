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


Route::group(['middleware'=>'language'], function(){
    Route::get('/', function () {
        return view('loginGuest');
    });
    Auth::routes();
    Route::get('language/{lang}', function($lang){
        \Session::put('locale', $lang);
        return redirect()->back();
    });

    Route::get('/admin', 'HomeController@index')->name('admin');

    Route::post('/', 'CodeController@login');

    Route::get('dashboard', function () {
        return view('guest.dashboard');
    });

    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
});

