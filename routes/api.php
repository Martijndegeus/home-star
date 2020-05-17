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

Route::get('scripts/{entity}/on', ['uses' => 'Api\ScriptController@switchOn', 'name' => 'home-assistant.scripts.on']);
Route::get('scripts/{entity}/off', ['uses' => 'Api\ScriptController@switchOff', 'name' => 'home-assistant.scripts.off']);
Route::get('scripts/{entity}/change', ['uses' => 'Api\ScriptController@changeState', 'name' => 'home-assistant.scripts.change']);

Route::get('switches/{entity}/on', ['uses' => 'Api\SwitchController@switchOn', 'name' => 'home-assistant.switches.on']);
Route::get('switches/{entity}/off', ['uses' => 'Api\SwitchController@switchOff', 'name' => 'home-assistant.switches.off']);
Route::get('switches/{entity}/change', ['uses' => 'Api\SwitchController@changeState', 'name' => 'home-assistant.switches.change']);

Route::get('media/{entity}/play', ['uses' => 'Api\MediaPlayerController@play', 'name' => 'home-assistant.media.play']);
Route::get('media/{entity}/pause', ['uses' => 'Api\MediaPlayerController@pause', 'name' => 'home-assistant.media.pause']);
Route::get('media/{entity}/volume-up', ['uses' => 'Api\MediaPlayerController@volumeUp', 'name' => 'home-assistant.media.volume-up']);
Route::get('media/{entity}/volume-down', ['uses' => 'Api\MediaPlayerController@volumeDown', 'name' => 'home-assistant.media.volume-down']);

Route::get('media/info', ['uses' => 'Api\HomeAssistantController@mediaInfo', 'name' => 'media.info']);

Route::get('news/{source}', ['uses' => 'Api\NewsController@feed', 'name' => 'news.feed']);
Route::get('weather/{city}', ['uses' => 'Api\WeatherController@current', 'name' => 'weather.current']);
