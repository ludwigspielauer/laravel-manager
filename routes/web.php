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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', 'HomeController@test');


Route::middleware(['auth'])->group(function () {
	Route::get('/projektwahl', 'ProjektController@projektwahlView');
	
	Route::post('/projekt/neu', 'ProjektController@newProjekt');
	Route::post('/projekt/change', 'ProjektController@changeProjekt');
	
	Route::get('benutzer/benutzer', 'BenutzerController@benutzerView');
	
	Route::get('/projekt/{projekt}/authentifizierung', 'BenutzerController@authentifizierungView');
	Route::post('/projekt/{projekt}/authentifizierung/save', 'BenutzerController@saveAuthentifizierung');
	
	Route::get('/aufbau/seiten', 'ConstuctionController@seitenView');
	Route::post('/aufbau/seiten/neu', 'ConstuctionController@newSeite');
	Route::get('/aufbau/seite/{seite}', 'ConstuctionController@pageView');
	Route::post('/aufbau/seite/{seite}/listen/neu', 'ConstuctionController@newListe');
	Route::post('/aufbau/seite/{seite}/formulare/neu', 'ConstuctionController@newFormular');
	Route::post('/aufbau/seite/{seite}/formulare/{formular}/input/neu', 'ConstuctionController@newInput');
	
	Route::get('/sicherheit', 'SecureController@sicherheitView');

});



