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
Route::get('/registrasi/{jobId}/{jobName}/{jobDesc}', 'RegistrasiController@index');

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

    Route::get('/setting','SettingController@index');

    Route::get('/updateAdminDetail/{eid}/{id}/{adminName}/{status}', 'AdministrationDetailController@updateAdministrationDetail');

    Route::post('/api/getDataApplicant','ApplicantController@apiGetDataApplicant');
    Route::post('/api/getDataForDashboard','DashboardController@apiGetDataForDashboard');
    Route::post('/api/getJobList','DashboardController@apiGetJobList');
    Route::post('/api/getApplicantList','DashboardController@apiGetApplicantList');
    Route::get('/api/downloadFileCv/{id}','DashboardController@apiDownloadFileCv');
    Route::get('/api/downloadOtherFile/{id}','DashboardController@apiDownloadOtherFile');
    Route::post('/api/sendEmail','DashboardController@apiSendEmail');
    Route::post('/api/sendNote','DashboardController@apiSendNote');
    Route::post('/api/updateQualified','DashboardController@apiUpdateQualified');
    Route::post('/api/updateAccepted','DashboardController@apiUpdateAccepted');
    Route::post('/api/getHistoryActivity','DashboardController@apiGetHistoryActivity');

    Route::get('/api/getCombo','SettingController@apiGetCombo');
    Route::post('/api/getComboValueList','SettingController@apiGetComboValueList');
    Route::post('/api/getComboName','SettingController@apiGetComboName');
    Route::post('/api/insertComboValue','SettingController@apiAddNewComboValue');
    Route::post('/api/getComboValueByID','SettingController@apiGetComboValueByID');
    Route::post('/api/updateComboValue','SettingController@apiUpdateComboValue');
    Route::post('/api/deleteComboValue','SettingController@apiDeleteComboValue');

    Route::post('/api/getComboForAcceptModal','ApplicantController@apiGetComboForAcceptModal');
    Route::post('/api/addEmployee','ApplicantController@apiAddEmployee');


});