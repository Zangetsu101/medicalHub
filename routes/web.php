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

Route::get('/appointments','PagesController@appointment')->name('appointments');

Route::resource('doctors','DoctorsController');

Route::resource('departments','DepartmentsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
