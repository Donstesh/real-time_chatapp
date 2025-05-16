<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Broadcast;

class BroadcastMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $channel;
    public array $payload;

    /**
     * Create a new job instance.
     */
    public function __construct(string $channel, array $payload)
    {
        $this->channel = $channel;
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Broadcast the event (could use a specific event class if desired)
        broadcast(new \App\Events\MessageBroadcasted($this->channel, $this->payload));
    }
}

