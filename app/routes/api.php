<?php

Route::group(array('prefix' => 'api'), function()
{
    Route::get('/user', 'ApiController@user');
    Route::get('/charts', 'ApiController@charts');
    Route::post('/search', 'ApiController@search');



    /* BAUTIZOS */
    /* ********************************************************************************************************************** */
    Route::get('/bautizos', 'ApiController@getBautizos');
    Route::post('/bautizo', 'ApiController@postBautizo');
    Route::get('/bautizo/{id}', 'ApiController@getBautizo');
    Route::post('/bautizo/{id}', 'ApiController@putBautizo');

    /* COMUNIONES */
    /* ********************************************************************************************************************** */
    Route::get('/comuniones', 'ApiController@getComuniones');
    Route::post('/comunion', 'ApiController@postComunion');
    Route::get('/comunion/{id}', 'ApiController@getComunion');
    Route::post('/comunion/{id}', 'ApiController@putComunion');

    /* CONFIRMACIONES */
    /* ********************************************************************************************************************** */
    Route::get('/confirmaciones', 'ApiController@getConfirmaciones');
    Route::post('/confirmacion', 'ApiController@postConfirmacion');
    Route::get('/confirmacion/{id}', 'ApiController@getConfirmacion');
    Route::post('/confirmacion/{id}', 'ApiController@putConfirmacion');

    /* MATRIMONIOS */
    /* ********************************************************************************************************************** */
    Route::get('/matrimonios', 'ApiController@getMatrimonios');
    Route::post('/matrimonio', 'ApiController@postMatrimonio');
    Route::get('/matrimonio/{id}', 'ApiController@getMatrimonio');
    Route::post('/matrimonio/{id}', 'ApiController@putMatrimonio');

    /* DEFUNCIONES */
    /* ********************************************************************************************************************** */
    Route::get('/defunciones', 'ApiController@getDefunciones');
    Route::post('/defuncion', 'ApiController@postDefuncion');
    Route::get('/defuncion/{id}', 'ApiController@getDefuncion');
    Route::post('/defuncion/{id}', 'ApiController@putDefuncion');
});

