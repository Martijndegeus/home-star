<?php

namespace App\Servers\HomeAssistant;

use App\Servers\Connector;
use Illuminate\Support\Facades\Http;

class HomeAssistantConnector implements Connector
{
    public static function get(string $endpoint)
    {
        return Http::withToken(env('HOME_ASSISTANT_TOKEN'))->get(env('HOME_ASSISTANT_API_URL') . $endpoint);
    }

    public static function post(string $endpoint, array $body)
    {
        return Http::withToken(env('HOME_ASSISTANT_TOKEN'))->post(env('HOME_ASSISTANT_API_URL') . $endpoint, $body);
    }
}
