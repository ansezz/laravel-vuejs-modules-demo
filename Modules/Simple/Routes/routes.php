<?php

Route::group(['middleware' => 'web', 'prefix' => 'simple', 'namespace' => 'Modules\Simple\Http\Controllers'], function()
{
    Route::get('/', 'SimpleController@index');
});
