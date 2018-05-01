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


//route for admin
Route::group(['middleware' => 'App\Http\Middleware\AuthMiddleware'], function () {

	
	// gift controller resource route
	Route::resource('child/gift', 'GiftController');
	

	//route for admin
	Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
		// user controller resource route
		Route::resource('user', 'UserController');

		//ajax request for loading all school name
		Route::get('/school/all', 'SchoolController@all');

		//ajax request for loading all case worker name
		Route::get('/caseworker/all', 'CaseworkerController@all');

		//ajax request for loading all case worker name
		Route::get('/advocate/all', 'AdvocateController@all');

		//request for searching caregivers
		Route::post('/custody/search', 'CustodyController@search');

		//request for assign caregivers
		Route::get('/custody/assign', 'CustodyController@assign');

		//request for remove custody 
		Route::get('/custody/remove', 'CustodyController@remove');

		//school cotroller resource route
		Route::resource('school', 'SchoolController');
		
		//Caregiver controller resource route
		Route::resource('/caregiver', 'CaregiverController');

		//child cotroller resource route
		Route::resource('child', 'ChildController');

		// case worker resource route
		Route::resource('caseworker','CaseworkerController');

		// advocate resource route
		Route::resource('advocate','AdvocateController');

		// agency controller resource route
		Route::resource('agency', 'AgencyController');

		// custody controller resource route
		Route::resource('custody', 'CustodyController');
	});

});