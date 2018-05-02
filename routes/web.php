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
    return redirect('login');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// gift controller resource route
// Route::resource('child/gift', 'GiftController');
	
//route group for caregiver
Route::group(['middleware' => 'App\Http\Middleware\CaregiverMiddleware'], function () {
	Route::get('care_giver/changepassword', function () {
	    return view('auth.edit2');
	});

	//caregiver home page
	Route::get('/care_giver', 'CaregiverController@home');

	//all childer assigned for the caegiver
	Route::get('/care_giver/children', 'ChildController@assigned');
});

//route group for logged in
Route::group(['middleware' => 'App\Http\Middleware\AuthMiddleware'], function () {

	//change password by individual
	Route::post('user/changepassword', 'UserController@changePsw');
	
	// gift controller resource route
	Route::resource('child/gift', 'GiftController');
	

	//route group for admin
	Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {

		//admin home page
		Route::get('/admin', 'UserController@home');

		Route::get('user/changepassword', function () {
		    return view('auth.edit');
		});
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