<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servers\HomeAssistant\SwitchEntity;

class SwitchController extends Controller
{
    public function changeState(string $entityId)
    {
        if(SwitchEntity::getState($entityId) === 'on') {
            $response = $this->switchOff($entityId);
        } else {
            $response = $this->switchOn($entityId);
        }

        return response()->json($response);
    }

    public function switchOn(String $entityId)
    {
        return SwitchEntity::switch($entityId, true);
    }

    public function switchOff(String $entityId)
    {
        return SwitchEntity::switch($entityId, false);
    }
}
