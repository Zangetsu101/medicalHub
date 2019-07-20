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

Route::get('/doctorlogin','PagesController@doctorLogin')->name('doctorLogin');

Route::get('/patientlogin','PagesController@patientLogin')->name('patientlogin');

Route::resource('doctors','DoctorsController');

Route::resource('departments','DepartmentsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/todayschedule', 'DashboardController@doctodayschedule')->name('doctodayschedule');

Route::get('/dashboard/apptfortoday', 'DashboardController@apptfortoday')->name('apptfortoday');

Route::get('/dashboard/admittedpatients', 'DashboardController@admittedpatients')->name('admittedpatients');

Route::get('/dashboard/emergencyops', 'DashboardController@emergencyops')->name('emergencyops');

Route::post('/doctors','DoctorsController@filter')->name('doctors.filter');

Route::get('/doctors/{doctor}/appointment','AppointmentController@index')->name('appointment.index');

Route::post('/doctors/{doctor}/appointment','AppointmentController@store')->name('appointment.store');


