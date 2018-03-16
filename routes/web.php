<?php

Route::get('{any?}', 'AppController@index')->where('any', '^(?!(api|xyz).*$).*');


Route::get('xyz', function (){
   return 'sadas';
});
