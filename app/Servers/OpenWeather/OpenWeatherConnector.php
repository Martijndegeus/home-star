<?php

namespace App\Servers\OpenWeather;

use App\Servers\Connector;
use Illuminate\Support\Facades\Http;

class OpenWeatherConnector implements Connector
{
    public static function get(string $endpoint)
    {
        return Http::get(env('OPEN_WEATHER_API_URL') . $endpoint . '&appid=' . env('OPEN_WEATHER_API_KEY') . '&units=metric');
    }

    public static function post(string $endpoint, array $body)
    {
        // TODO: Implement post() method.
    }
}
