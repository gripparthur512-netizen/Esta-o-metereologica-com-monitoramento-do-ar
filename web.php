<?php

use App\Http\Controllers\WeatherStationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('weather-stations.index');
});

Route::resource('weather-stations', WeatherStationController::class);
