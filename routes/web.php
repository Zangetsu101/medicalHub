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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/prescription-{prescription}','PrescriptionController@show')->name('prescription.show');

Route::get('/dashboard/prescription-{prescription}/report-{report}','ReportController@show')->name('report.show');

Route::post('/doctors','DoctorsController@filter')->name('doctors.filter');

Route::get('/doctors/{doctor}/appointment','AppointmentController@index')->name('appointment.index');

Route::post('/doctors/{doctor}/appointment','AppointmentController@store')->name('appointment.store');

Route::get('/hospitals','PagesController@hospitals')->name('hospitals.index');

Route::get('/docreg', 'DoctorsController@doctorRegister')->name('docreg');

Route::post('/docreg', 'DoctorsController@create')->name('doctor.create');

Route::get('/hosreg', 'HospitalsController@hospitalRegister')->name('hosreg');

Route::post('/hosreg', 'HospitalsController@create')->name('hospital.create');

Route::get('/{doctor}/timingform', 'DoctorsController@timingForm')->name('timingform');

Route::post('/{doctor}/timingform', 'DoctorsController@doctorTiming')->name('doctiming.create');