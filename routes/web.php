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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Caregiver controller resource route
Route::resource('/caregiver', 'CaregiverController');

//child cotroller resource route
Route::resource('child', 'ChildController');


Route::resource('caseworker','CaseworkerController');

//school cotroller resource route
Route::resource('school', 'SchoolController');

