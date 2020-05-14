<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('entities', ['uses' => 'Api\SettingsController@entities', 'name' => 'home-assistant.switches']);
Route::get('switches/{entity}/on', ['uses' => 'Api\SettingsController@switchOn', 'name' => 'home-assistant.switches.on']);
Route::get('switches/{entity}/off', ['uses' => 'Api\SettingsController@switchOff', 'name' => 'home-assistant.switches.off']);

Route::get('news/{source}', ['uses' => 'Api\NewsController@feed', 'name' => 'news.feed']);
Route::get('weather/{city}', ['uses' => 'Api\WeatherController@current', 'name' => 'weather.current']);
