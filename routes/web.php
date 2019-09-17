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

Route::get('/','PagesController@index')->name('/');

Route::resource('doctors','DoctorsController');

Route::resource('departments','DepartmentsController');

Route::resource('hospitals','HospitalsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/prescription-{prescription}','PrescriptionController@show')->name('prescription.show');

Route::get('/dashboard/prescription-{prescription}/test-{test}','TestController@show')->name('test.show');

Route::get('/dashboard/upcomingevents', 'DashboardController@upcomingevents')->name('upcomingevents');

Route::get('/dashboard/todayappts', 'DashboardController@todayappts')->name('todayappts');

Route::get('/dashboard/previousappts', 'DashboardController@previousappts')->name('previousappts');

Route::get('/dashboard/admittedpatients', 'DashboardController@admittedpatients')->name('admittedpatients');

Route::get('/dashboard/emergencyops', 'DashboardController@emergencyops')->name('emergencyops');

Route::post('/doctors','DoctorsController@filter')->name('doctors.filter');

Route::get('/appointment/{appointment}','AppointmentController@destroy')->name('appointment.destroy');

Route::get('/patient-{patient}','PatientsController@show')->name('patient.show');

Route::get('/patient-{patient}/weights','PatientsController@showweights')->name('patient.weights');

Route::get('/patient-{patient}/bps','PatientsController@showbps')->name('patient.bps');

Route::post('/doctors/{doctor}/appointment','AppointmentController@store')->name('appointment.store');

Route::get('/hospitals','PagesController@hospitals')->name('hospitals.index');

Route::get('/docreg', 'DoctorsController@doctorRegister')->name('docreg');

Route::post('/docreg', 'DoctorsController@create')->name('doctor.create');

Route::get('/hosreg', 'HospitalsController@hospitalRegister')->name('hosreg');

Route::post('/hosreg', 'HospitalsController@create')->name('hospital.create');

Route::get('/{doctor}/timingform', 'DoctorsController@timingForm')->name('timingform');

Route::post('/{doctor}/timingform', 'DoctorsController@doctorTiming')->name('doctiming.create');

Route::get('/appointment-{appointment}/prescriptioncreate', 'PrescriptionController@prescriptioncreate')->name('prescriptioncreate');

Route::get('/hosedit/{hospital}', 'HospitalsController@edit')->name('hosedit');

Route::post('/hosedit/{hospital}', 'HospitalsController@update')->name('hosupdate');

Route::get('/docedit/{doctor}', 'DoctorsController@edit')->name('docedit');

Route::post('/docedit/{doctor}', 'DoctorsController@update')->name('docupdate');

Route::get('/{appointment}/rating', 'RatingController@index')->name('ratingform');

Route::post('/{appointment}/rating', 'RatingController@create')->name('ratingsubmission');

Route::get('/statistics','DashboardController@statistics')->name('stats');

