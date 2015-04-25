<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/**
 * Static pages
 */
Route::get('/', 'PagesController@home');
Route::get('/appointments', ['as' => 'appointments_interstitial','uses' => 'PagesController@appointments']);

/**
 * Appointment routes
 */
Route::post('/appointments/schedule/{weeks?}', 'AppointmentsController@schedule');
Route::get('/appointments/schedule/{weeks?}', 'AppointmentsController@viewWeek');
Route::get('/appointments/return', 'AppointmentsController@forgetAppointment');
Route::get('/appointments/make/{time}', ['as' => 'create_appointment_path', 'uses' => 'AppointmentsController@create']);
Route::get('/appointments/{appointment}/cancel', 'AppointmentsController@cancel');
Route::delete('/appointments/{appointment}/cancel', 'AppointmentsController@delete');

/**
 * Dog routes
 */
Route::get('dogs/add',['as' => 'add_dog_route', 'uses' => 'DogsController@create']);
Route::post('dogs/add', ['as' => 'add_dog_route', 'uses' => 'DogsController@store']);

/**
 * Dashboards / Admin
 */
Route::get('dashboard', ['as' => 'dashboard_route', 'uses' => 'PagesController@dashboard']);
Route::get('clients/{name}', 'ClientsController@show');
Route::get('clients', 'ClientsController@index');