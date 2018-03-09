<?php

Route::group(['middleware' => 'web', 'prefix' => 'news', 'namespace' => 'Modules\News\Http\Controllers'], function()
{
    Route::get('/', 'NewsController@index');
});
