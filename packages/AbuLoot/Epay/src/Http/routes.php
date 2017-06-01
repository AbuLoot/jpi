<?php

Route::get('pay/{amount}', 'AbuLoot\Epay\Http\Controllers\EpayController@pay');
Route::get('payment', 'AbuLoot\Epay\Http\Controllers\EpayController@payment');
Route::get('postlink', 'AbuLoot\Epay\Http\Controllers\EpayController@postlink');
