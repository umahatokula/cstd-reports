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

Auth::routes();


Route::get('/master', function () {
    return view('master');
})->name('master');


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect('dashboard');
    });



    Route::get('/dashboard', 'HomeController@index')->name('dashboard');


    // reports
    Route::post('reports/{id}/counterSign', 'MonthlyPerformanceEvaluationController@counterSign')->name('reports.counterSign');
    Route::get('reports/{id}/evaluate', 'MonthlyPerformanceEvaluationController@evaluate')->name('reports.evaluate')->middleware('level:12');
    Route::put('reports/{id}/storeEvaluation', 'MonthlyPerformanceEvaluationController@storeEvaluation')->name('reports.storeEvaluation')->middleware('role:unithead');
    Route::get('reports/{id}/delete', 'MonthlyPerformanceEvaluationController@delete')->name('reports.delete');
    Route::resource('reports', 'MonthlyPerformanceEvaluationController');



    // departments
    Route::resource('departments', 'DepartmentController');


    // staff
    Route::get('staff/{staff_id}/get-reset-password', 'StaffController@getReset')->name('staff.get-reset-password');
    Route::post('staff/post-reset-password', 'StaffController@storeChangedPassword')->name('staff.post-reset-password');
    Route::resource('staff', 'StaffController');


    // divisions
    Route::resource('divisions', 'DivisionController');


    // units
    Route::resource('units', 'UnitController');


    // grade levels
    Route::resource('gradeLevels', 'GradeLevelController');


    // settings
    Route::post('settings/store-monthly-report', 'SettingController@storeMonthlyReport')->name('settings.storeMonthlyReport');
    Route::post('settings/store-appper', 'SettingController@storeAPPER')->name('settings.storeAPPER');
    Route::resource('settings', 'SettingController');


    // aper forms
    Route::get('aper-forms/print', 'AperFormController@print')->name('aper-forms.print');
    Route::get('aper-forms/reports', 'AperFormController@reports')->name('aper-forms.reports');
    Route::get('aper-forms/{id}/accept', 'AperFormController@accept')->name('aper-forms.accept');
    Route::post('aper-forms/{id}/acceptAperEvaluation', 'AperFormController@acceptAperEvaluation')->name('aper-forms.acceptAperEvaluation');
    Route::get('aper-forms/{id}/evaluate', 'AperFormController@evaluate')->name('aper-forms.evaluate');
    Route::post('aper-forms/{id}/isEvaluated', 'AperFormController@isEvaluated')->name('aper-forms.isEvaluated');
    Route::post('aper-forms/{id}/store/evaluate', 'AperFormController@storeEvaluate')->name('aper-forms.storeEvaluate');
    Route::get('aper-forms/{id}/preview', 'AperFormController@preview')->name('aper-forms.preview');
    Route::post('aper-forms/store/personal', 'AperFormController@storePersonal')->name('aper-forms.storePersonal');
    Route::post('aper-forms/store/targets', 'AperFormController@storeTargets')->name('aper-forms.storeTargets');
    Route::post('aper-forms/store/jobs', 'AperFormController@storeJobs')->name('aper-forms.storeJobs');
    Route::post('aper-forms/store/trainings', 'AperFormController@storeTrainings')->name('aper-forms.storeTrainings');
    Route::get('aper-forms', 'AperFormController@index')->name('aper-forms.index');
    Route::get('aper-forms/create', 'AperFormController@create')->name('aper-forms.create');
    Route::get('aper-forms/{id}/edit', 'AperFormController@edit')->name('aper-forms.edit');
    Route::get('aper-forms/{id}/delete', 'AperFormController@delete')->name('aper-forms.delete');


    //Users
    Route::get('users/{id}/delete', ['as'=> 'users.delete', 'uses' => 'UsersController@delete']);
    Route::resource('users', 'UsersController');


    //Roles
    Route::get('roles', 'RolesController@getRoles')->name('roles');
});
