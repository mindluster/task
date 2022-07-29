<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        // asign user to send in live version
        $user = DB::table('users')->toArray();
        Mail::send('emails.mailEvent', $user, function($message) use ($user) {
            $message->to('test@mail.com');
            $message->subject('Event Testing');
        });
    }
}
