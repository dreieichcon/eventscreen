<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public string $message)
    {

    }

    public function broadcastOn(): array
    {
        sleep(1);
       // $id = $this->user->id;
        return [
            //new PrivateChannel("App.Models.User.{$id}")
            new PrivateChannel("Custom.Channel.1")
        ];
    }
}
