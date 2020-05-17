<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servers\HomeAssistant\Entity;
use App\Servers\HomeAssistant\ScriptEntity;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function entities()
    {
        return response()->json(Entity::all());
    }
}
