<?php

namespace App;

use App\Models\User;
use App\Events\NotificationSent;

trait Notifiable
{
    public function sendNotification($userId, $title, $message, $url = null)
    {
        $user = User::find($userId);
        
        if (!$user) return;
        
        $notification = $user->notifications()->create([
            'data' => [
                'title' => $title,
                'message' => $message,
                'url' => $url,
            ]
        ]);
        
        event(new NotificationSent($userId, $notification));
    }
}
