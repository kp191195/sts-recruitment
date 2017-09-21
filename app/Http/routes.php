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

Route::get('/', function () {
    //
    return view('login.login');
});
Route::get('/registrasi', 'RegistrasiController@index');

Route::post('/getLogins', 'DoLoginController@getLogins');
Route::post('/applyJob', 'RegistrasiController@addApplicant');


Route::group(['middleware'=>'loggedUser'],function(){
    Route::get('/home',function(){
        return view('welcome-use-template');
    });    

    Route::get('/logout', 'DoLogoutController@logout');
    Route::get('/dashboard', 'DashboardController@getDashboard');
    Route::get('/applicant/{jid}', 'ApplicantController@getApplicant');
});