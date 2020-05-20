<?php


namespace App\Servers\HomeAssistant;


trait PollableState
{
    public static function getState(string $entityId)
    {
        $endpoint = 'states/' . $entityId;

        return HomeAssistantConnector::get($endpoint);
    }

}
