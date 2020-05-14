<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servers\HomeAssistant\Entity;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function entities()
    {
        return response()->json(Entity::all());
    }

    public function switchOn(String $entityId)
    {
        return response()->json(Entity::switch($entityId, true));
    }

    public function switchOff(String $entityId)
    {
        return response()->json(Entity::switch($entityId, false));
    }
}
