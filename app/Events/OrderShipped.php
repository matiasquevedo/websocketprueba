<?php

namespace App\Events;

use App\Commerce;
use App\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderShipped implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $commerce;
    public $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Commerce $commerce, Order $order)
    {
        //
        $this->commerce = $commerce;
        // dd($this->commerce);
        $this->order = $order;
        // dd($this->commerce, $this->order);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // dd('order-of-'.$this->commerce->slug);
        return new Channel('order-of-'.$this->commerce->slug);
    }
}
