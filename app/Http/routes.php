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
    Route::get('/dashboard', 'DashboardController@index');
    // Route::get('/applicant', 'ApplicantController@getApplicant');
    Route::get('/applicant', 'ApplicantController@index');
    Route::get('/administration', 'AdministrationController@getAdministrationList');
    Route::get('/administrationDetail/{eid}/', 'AdministrationDetailController@getAdministrationDetail');

    Route::post('/api/getDataApplicant','ApplicantController@apiGetDataApplicant');
    Route::post('/api/getDataForDashboard','DashboardController@apiGetDataForDashboard');
    Route::post('/api/getJobList','DashboardController@apiGetJobList');
    Route::post('/api/getApplicantList','DashboardController@apiGetApplicantList');
    Route::get('/api/downloadFileCv/{id}','DashboardController@apiDownloadFileCv');
    Route::get('/api/downloadOtherFile/{id}','DashboardController@apiDownloadOtherFile');
    Route::post('/api/sendEmail','DashboardController@apiSendEmail');
    Route::post('/api/sendNote','DashboardController@apiSendNote');
    Route::post('/api/getHistoryActivity','DashboardController@apiGetHistoryActivity');
    
});