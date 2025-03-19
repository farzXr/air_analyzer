<?php

namespace App\Events;

use App\Http\Resources\TestWs\GetDataResource;
use App\Models\TestWs;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestWsEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private TestWs $testWs;
    /**
     * Create a new event instance.
     */
    public function __construct(TestWs $testWs)
    {
        $this->testWs = $testWs;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('test-ws'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'test_ws';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => new GetDataResource($this->testWs)
        ];
    }
}
