<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servers\HomeAssistant\LightEntity;

class LightController extends Controller
{
    public function changeState(string $entityId)
    {
        if(LightEntity::getState($entityId) == 'on') {
            $response = LightEntity::switch($entityId, false);
        } else {
            $response = LightEntity::switch($entityId, true);
        }

        return $response;
    }

    public function switchOn(String $entityId)
    {
        return LightEntity::switch($entityId, true);
    }

    public function switchOff(String $entityId)
    {
        return LightEntity::switch($entityId, false);
    }
}
