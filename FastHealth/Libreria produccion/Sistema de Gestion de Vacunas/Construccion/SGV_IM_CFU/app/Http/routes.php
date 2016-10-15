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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::resource('suppliers', 'SupplierController');

Route::get('suppliers/{id}/delete', [
    'as' => 'suppliers.delete',
    'uses' => 'SupplierController@destroy',
]);


Route::resource('vaccines', 'VaccineController');

Route::get('vaccines/{id}/delete', [
    'as' => 'vaccines.delete',
    'uses' => 'VaccineController@destroy',
]);


Route::resource('requestvaccines', 'RequestvaccinesController');

Route::get('requestvaccines/{id}/delete', [
    'as' => 'requestvaccines.delete',
    'uses' => 'RequestvaccinesController@destroy',
]);
