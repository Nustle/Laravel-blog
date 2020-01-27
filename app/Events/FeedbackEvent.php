<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FeedbackEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $data;

    /**
     * Create a new FeedbackEvent instance.
     *
     * @return $this
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Returns all input requests.
     *
     * @return array
     */
    public function getInputData()
    {
        return $this->data;
    }
}
