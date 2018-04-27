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

//ajax request for loading all school name
Route::get('/school/all', 'SchoolController@all');

//ajax request for loading all case worker name
Route::get('/caseworker/all', 'CaseworkerController@all');

//request for searching caregivers
Route::post('/custody/search', 'CustodyController@search');

// gift post route returning the CRUD view
// Route::post('child/gift/add', 'GiftController@indexView');

// gift controller resource route
Route::resource('child/gift', 'GiftController');

//Caregiver controller resource route
Route::resource('/caregiver', 'CaregiverController');

//child cotroller resource route
Route::resource('child', 'ChildController');

// case worker resource route
Route::resource('caseworker','CaseworkerController');

//school cotroller resource route
Route::resource('school', 'SchoolController');

// agency controller resource route
Route::resource('agency', 'AgencyController');

// custody controller resource route
Route::resource('custody', 'CustodyController');