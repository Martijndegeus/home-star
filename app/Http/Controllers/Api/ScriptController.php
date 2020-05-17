<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servers\HomeAssistant\ScriptEntity;

class ScriptController extends Controller
{
    public function changeState(string $entityId)
    {
        if(ScriptEntity::getState($entityId) === 'on') {
            $response = $this->switchOff($entityId);
        } else {
            $response = $this->switchOn($entityId);
        }

        return response()->json($response);
    }

    public function switchOn(String $entityId)
    {
        return response()->json(ScriptEntity::switch($entityId, true));
    }

    public function switchOff(String $entityId)
    {
        return response()->json(ScriptEntity::switch($entityId, false));
    }
}
