<?php


namespace App\Servers\HomeAssistant;


class SwitchEntity extends Entity
{
    use PollableState;

    public static function switch(string $entityId,bool $switchOn)
    {
        $state = 'turn_off';
        $response = 'off';

        if ($switchOn) {
            $state = 'turn_on';
            $response = 'on';
        }

        $endpoint = 'services/switch/' . $state;

        HomeAssistantConnector::post($endpoint, [
            'entity_id' => $entityId,
        ]);

        return $response;
    }
}
