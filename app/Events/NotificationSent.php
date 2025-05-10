<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $userId;
    public $notification;
    /**
     * Create a new event instance.
     */
    public function __construct($userId, $notification)
    {
        $this->userId = $userId;
        $this->notification = $notification;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('user.' . $this->userId);

    }
    public function broadcastAs()
    {
        return 'notification.received';
    }
}
