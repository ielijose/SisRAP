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

Route::get('/email', function(){
    $cotizacion = Cotizacion::first();
    return View::make('emails.cotizacion', compact('cotizacion'));
});