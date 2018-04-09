<?php

Route::get('{any?}', 'AppController@index')->where('any', '^(?!(api|graphiql|graphql|oauth).*$).*');
