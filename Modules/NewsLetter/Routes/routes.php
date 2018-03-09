<?php

Route::group(['middleware' => 'web', 'prefix' => 'newsletter', 'namespace' => 'Modules\NewsLetter\Http\Controllers'], function()
{
    Route::get('/', 'NewsLetterController@index');
});
