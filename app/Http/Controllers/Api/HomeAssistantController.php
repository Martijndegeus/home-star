<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servers\HomeAssistant\HomeAssistantConnector;
use App\Servers\HomeAssistant\MediaPlayerEntity;
use Illuminate\Http\Request;

class HomeAssistantController extends Controller
{
    public function mediaInfo()
    {
        MediaPlayerEntity::play('media_player.living_room_tv');

        return HomeAssistantConnector::get('states/media_player.living_room_tv');
    }
}
