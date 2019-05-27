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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');



Route::resource('etudiants', 'EtudiantController');
Route::resource('employes', 'EmployeController');

Route::get('/biblio', function () {
    return view('biblio');
});




Route::get('getOuvrages', 'OuvrageController@getOuvrages');
Route::get( 'getRatedOuvrages', 'OuvrageController@getRatedOuvrages');


Route::get( 'getOuvrageRate{id}', 'RateController@getOuvrageRate');


Route::resource('ouvrages', 'OuvrageController');

Route::resource('auteurs', 'AuteurController');