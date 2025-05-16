<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageBroadcasted implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public string $channelName;
    public array $payload;

    public function __construct(string $channelName, array $payload)
    {
        $this->channelName = $channelName;
        $this->payload = $payload;
    }

    public function broadcastOn(): Channel
    {
        return new Channel($this->channelName);
    }

    public function broadcastWith(): array
    {
        return $this->payload;
    }

    public function broadcastAs(): string
    {
        return 'message.sent';
    }
}

