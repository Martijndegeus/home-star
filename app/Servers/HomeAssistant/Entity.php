<?php


namespace App\Servers\HomeAssistant;


class Entity
{
    public static function switch(string $entityId, bool $switchOn)
    {
        $state = 'turn_off';

        if ($switchOn) {
            $state = 'turn_on';
        }

        $endpoint = 'services/switch/' . $state;

        $response = HomeAssistantConnector::post($endpoint, [
            'entity_id' => $entityId,
        ]);

//        return $response->body();

        return $response;
    }

    public static function all()
    {
        $endpoint = 'states';

        $entities = json_decode(HomeAssistantConnector::get($endpoint));

        $numberOfEntities = sizeof($entities);

        $response = [];

        for ($i = 0; $i < $numberOfEntities; $i++) {
            if (strpos($entities[$i]->entity_id, 'switch') !== false) {
                $response['switch'][] = $entities[$i];
            } else if (strpos($entities[$i]->entity_id, 'sensor') !== false) {
                $response['sensor'][] = $entities[$i];
            } else if (strpos($entities[$i]->entity_id, 'person') !== false) {
                $response['person'][] = $entities[$i];
            } else if (strpos($entities[$i]->entity_id, 'script') !== false) {
                $response['script'][] = $entities[$i];
            } else {
                $response['other'][] = $entities[$i];
            }
        }

        return $response;
    }
}
