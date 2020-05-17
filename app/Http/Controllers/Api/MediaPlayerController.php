<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servers\HomeAssistant\MediaPlayerEntity;

class MediaPlayerController extends Controller
{
    public function play(string $entityId)
    {
        return response()->json(MediaPlayerEntity::play($entityId));
    }

    public function pause(string $entityId)
    {
        return response()->json(MediaPlayerEntity::pause($entityId));
    }

    public function volumeUp(string $entityId)
    {
        return response()->json(MediaPlayerEntity::volumeUp($entityId));
    }

    public function volumeDown(string $entityId)
    {
        return response()->json(MediaPlayerEntity::volumeDown($entityId));
    }
}
