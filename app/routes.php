<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Auth::logout();

Route::get('/', array('before' => 'auth', 'uses' => 'HomeController@index'));

Route::get('/login', 'HomeController@login');
Route::post('/login', 'HomeController@postLogin');
Route::get('/logout', 'HomeController@logout');

require "routes/api.php";

Route::any('/files/generate/bautizo', array('before' => 'auth', 'uses' => 'FilesController@acta_bautizo'));
Route::any('/files/generate/comunion', array('before' => 'auth', 'uses' => 'FilesController@acta_comunion'));
Route::any('/files/generate/confirmacion', array('before' => 'auth', 'uses' => 'FilesController@acta_confirmacion'));
Route::any('/files/generate/matrimonio', array('before' => 'auth', 'uses' => 'FilesController@acta_matrimonio'));
Route::any('/files/generate/defuncion', array('before' => 'auth', 'uses' => 'FilesController@acta_defuncion'));