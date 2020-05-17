<?php


namespace App\Servers\HomeAssistant;


class MediaPlayerEntity extends Entity
{
    public static function switch(string $entityId, bool $switchOn)
    {
        // TODO: Implement switch() method.
    }

    public static function play(string $entityId)
    {
        $endpoint = 'services/media_player/media_play';

        return HomeAssistantConnector::post($endpoint, [
            'entity_id' => $entityId,
        ]);
    }

    public static function pause(string $entityId)
    {
        $endpoint = 'services/media_player/media_pause';

        return HomeAssistantConnector::post($endpoint, [
            'entity_id' => $entityId,
        ]);
    }

    public static function volumeUp(string $entityId)
    {
        $endpoint = 'services/media_player/volume_up';

        return HomeAssistantConnector::post($endpoint, [
            'entity_id' => $entityId,
        ]);
    }

    public static function volumeDown(string $entityId)
    {
        $endpoint = 'services/media_player/volume_down';

        return HomeAssistantConnector::post($endpoint, [
            'entity_id' => $entityId,
        ]);
    }
}
