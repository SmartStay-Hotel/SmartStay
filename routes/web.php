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

Route::get('/', function () {
    return view('loginGuest');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');



Route::post('/', 'CodeController@login');

Route::get('dashboard', function () {
    return view('guest.dashboard');
});
//SSL
Route::get('.well-known/acme-challenge/0Bto4sHnkxqR40GnuyQ6dXqmPW8ChLIjZf4qJXYKzoQ', function () {
    return "0Bto4sHnkxqR40GnuyQ6dXqmPW8ChLIjZf4qJXYKzoQ.-jPNpDhIwB2QYPLNqLkrMU_X_ze7Mwb7UKe2TZR0P58";
});