<?php

namespace App\Listeners;

use App\Events\Userevent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;

class Userlistener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Userevent $event): void
    {
        $existingUser = User::where('email', 'okpekuighoadro@gmail.com')->first();
          if(!$existingUser){
            User::create([
                'firstname' => $event->firstname,
                'lastname' => $event->lastname,
                'email' => $event->email,
                'password' =>Hash::make($event->password),
                'status' => $event->status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
          }



    }
}
