<?php

Route::group(array('prefix' => 'api'), function()
{
    Route::get('/tours', 'ApiController@getTours');
    Route::get('/tour/{id?}', 'ApiController@getTour');

    Route::post('/cotizar', 'ApiController@postCotizar');

    Route::get('/user', 'ApiController@user');
});

