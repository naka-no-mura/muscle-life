<?php

namespace App\Listeners;

use App\Events\UserRegisteredPublish;
use App\Mail\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailRegisteredNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * アカウント登録完了のメール送信
     */
    public function handle(UserRegisteredPublish $event): void
    {
        $user = $event->user;
        Mail::to($user->email)->send(new Registered($user));
    }
}
