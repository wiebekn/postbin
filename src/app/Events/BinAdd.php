<?php

namespace App\Events;

use App\Bin;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BinAdd implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Bin
     */
    public $bin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bin $objBin)
    {
        $this->bin = $objBin;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
//        return new Channel('bin-' . $this->bin->uuid);
        return new Channel('binlist');
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'bin.added';
    }
}
