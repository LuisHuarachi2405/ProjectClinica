<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/pacientes', 'PatientController@index');
Route::get('/farmacia', 'FarmaciaController@index');


Route::get('getpacientes','PatientController@getPatientes');

Route::post('crearPaciente','PatientController@crearPaciente');

Route::post('updatePatient','PatientController@updatePatient');


Route::get('getpaciFarmacia','FarmaciaController@getpatFarmacia');
// Route::get('/farmacia', 'PatientController@index');

