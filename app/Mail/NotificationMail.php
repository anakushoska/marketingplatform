<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notification,$mostVowelsWord)
    {

        $this->notification = $notification;
        $this->word=$mostVowelsWord["word"];
        $this->count=$mostVowelsWord["vowelCount"];
        $this->vowels=implode($mostVowelsWord["vowels"]);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notifications.mail')

                    ->with("notification",$this->notification)
                    ->with("word",$this->word)
                    ->with("count",$this->count)
                    ->with("vowels",$this->vowels);


    }


}
