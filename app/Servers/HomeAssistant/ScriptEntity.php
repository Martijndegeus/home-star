<?php


namespace App\Servers\HomeAssistant;


class ScriptEntity extends Entity
{
    use PollableState;

    public static function switch(string $entityId, bool $switchOn)
    {
        $state = 'turn_off';

        if ($switchOn) {
            $state = 'turn_on';
        }

        $endpoint = 'services/script/' . $state;

        return HomeAssistantConnector::post($endpoint, [
            'entity_id' => $entityId,
        ]);
    }
}
