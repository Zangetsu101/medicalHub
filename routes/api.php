<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('avail_medicines','MedicineController@Index')->name('avail_medicines.index');

Route::post('avail_medicines','MedicineController@NewMedicine');

Route::get('symptoms','SymptomController@Index')->name('symptoms.index');

Route::post('symptoms','SymptomController@NewSymptom');

Route::get('tests','TestController@Index')->name('tests.index');

Route::post('tests','TestController@NewTest');

Route::post('pres_medicine','MedicineController@NewPrescribedMedicine')->name('presmedicine.create');

Route::post('pres_symp','SymptomController@PrescriptionSymptom')->name('pressymp.create');

Route::post('pres_test','TestController@NewPrescribedTest')->name('prestest.create');

Route::post('prescription','PrescriptionController@create')->name('prescription.create');
