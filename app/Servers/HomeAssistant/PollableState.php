<?php


namespace App\Servers\HomeAssistant;


trait PollableState
{
    public static function getState(string $entityId)
    {
        $endpoint = 'states/' . $entityId;

        return json_decode(HomeAssistantConnector::get($endpoint))->state;
    }

}
