<?php

Route::group(['middleware' => 'web', 'prefix' => 'hello', 'namespace' => 'Modules\Hello\Http\Controllers'], function () {
    Route::get('/', 'HelloController@index');
});


