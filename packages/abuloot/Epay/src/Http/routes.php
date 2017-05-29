<?php

Route::get('epay/test', 'AbuLoot\Epay\Http\Controllers\EpayController@test');

Route::get('payment/{amount}', 'AbuLoot\Epay\Http\Controllers\EpayController@index');
Route::get('postlink', 'AbuLoot\Epay\Http\Controllers\EpayController@postlink');
