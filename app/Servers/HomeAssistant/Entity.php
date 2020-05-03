<?php


namespace App\Servers\HomeAssistant;


class Entity
{
    public static function switch(string $entityId, bool $switchOn)
    {
        $state = 'turn_off';

        if($switchOn) {
            $state = 'turn_on';
        }

        $endpoint = 'services/switch/' . $state;

        $response = Connector::post($endpoint, [
            'entity_id' => $entityId,
        ]);

//        return $response->body();

        return $response;
    }

    public static function entities()
    {
        $endpoint = 'states';

        $entities = json_decode(Connector::get($endpoint));

        $numberOfEntities = sizeof($entities);

        $response = [];

        for ($i = 0; $i < $numberOfEntities; $i++) {
            if(strpos($entities[$i]->entity_id, 'switch') !== false) {
                $response['switch'][] = $entities[$i];
//                $entities[$i]->type = 'switch';
            } else if(strpos($entities[$i]->entity_id, 'sensor') !== false) {
                $response['sensor'][] = $entities[$i];
//                $entities[$i]->type = 'sensor';
            } else if(strpos($entities[$i]->entity_id, 'person') !== false) {
                $response['person'][] = $entities[$i];
//                $entities[$i]->type = 'person';
            } else {
                $response['other'][] = $entities[$i];
            }
        }

        return $response;
    }
}
