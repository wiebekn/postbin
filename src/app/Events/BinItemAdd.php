<?php

namespace App\Events;

use App\BinItem;
use App\Http\Resources\BinItemResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BinItemAdd implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var BinItem
     */
    public $binItem;

    /**
     * Create a new event instance.
     *
     * @param BinItem $objBinItem
     */
    public function __construct(BinItem $objBinItem)
    {
        $this->binItem = new BinItemResource($objBinItem);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('binitem');
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'binitem.added';
    }
}
