<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\UserLoginNotification;


class SendLoginNotification
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
    
    /*public function handle(UserLoggedIn $event): void
    {
        $user = $event->user;
        $user->notify(new UserLoginNotification());
    }*/
}
