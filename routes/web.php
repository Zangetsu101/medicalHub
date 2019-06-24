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

Route::get('/','PagesController@index');

Route::get('/doctorlogin','PagesController@doctorLogin');

Route::get('/patientlogin','PagesController@patientLogin');

Route::get('/doctor','PagesController@doctor');

Route::get('/appointment','PagesController@appointment');