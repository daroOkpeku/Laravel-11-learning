<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Userevent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $firstname;
    public $lastname;
    public $status;
    public $email;
    public $password;
    /**
     * Create a new event instance.
     */
    public function __construct($firstname, $lastname, $status, $email, $password)
    {

        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->status = $status;
        $this->password = $password;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
