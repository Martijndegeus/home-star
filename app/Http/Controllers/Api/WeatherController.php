<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servers\OpenWeather\OpenWeatherConnector;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function current(String $city)
    {
        $data = json_decode(OpenWeatherConnector::get('?q=' . $city));

        $icons = [];
        $iconUrl = env('OPEN_WHEATHER_ICON_URL');
        $iconName = $data->weather[0]->icon;

        $icons['small'] = $iconUrl . $iconName . '.png';
        $icons['large'] = $iconUrl . $iconName . '@2x.png';

        $data->weather[0]->icons = $icons;

        return response()->json($data);
    }
}
