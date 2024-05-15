<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $userName;
    public function __construct($userName)
    {
        $this->userName = $userName;
    }
    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('New registered user')
                    ->view('mail.new-user-mail')
                    ->with(['userName' => $this->userName]);
    }
}
