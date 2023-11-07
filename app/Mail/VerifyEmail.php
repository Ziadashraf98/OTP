<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_code)
    {
        $this->user_code = $user_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user_code = $this->user_code;
        return $this->markdown('mails.email' , compact('user_code'));
    }
}