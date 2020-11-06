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
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/users', 'UserController@index')->name('users');
Route::resource('/user', 'UserController');


Route::get('/clients', 'ClientController@index')->name('clients');
Route::resource('/client', 'ClientController');

Route::get('/getclient/{id}', 'ClientController@getclient');


Route::get('/pets', 'PetController@index')->name('pets');
Route::resource('/pet', 'PetController');
Route::get('/pets/{id}', 'PetController@pets_client');
Route::get('/getpets/{id}', 'PetController@getpets');


Route::get('/providers', 'ProviderController@index')->name('providers');
Route::resource('/provider', 'ProviderController');


Route::get('/treatments', 'TreatmentController@index')->name('treatments');
Route::resource('/treatment', 'TreatmentController');
Route::get('/gettreatment/{id}', 'TreatmentController@gettreatment');


Route::get('/new_consultation', 'ConsultationController@index_new_consultation')->name('new_consultation');


Route::post('/store_new_consultation', 'ConsultationController@store_new_consultation')->name('store_new_consultation');

Route::post('/store_medical_record', 'Medical_recordController@store_medical_record');
Route::get('/getmedical_records/{id}', 'Medical_recordController@getmedical_records');