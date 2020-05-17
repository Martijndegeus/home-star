<?php


namespace App\Servers\HomeAssistant;


class SwitchEntity extends Entity
{
    use PollableState;

    public static function switch(string $entityId,bool $switchOn)
    {
        $state = 'turn_off';

        if ($switchOn) {
            $state = 'turn_on';
        }

        $endpoint = 'services/switch/' . $state;

        $response = HomeAssistantConnector::post($endpoint, [
            'entity_id' => $entityId,
        ]);

        return $response;
    }
}
