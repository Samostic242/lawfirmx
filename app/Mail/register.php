<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class register extends Mailable
{
    use Queueable, SerializesModels;
    public $clientDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clientDetails)
    {
        $this->clientDetails = $clientDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->clientDetails->email)
                    ->subject('Law Firm X, Profile Creation')
                    ->view('mail.profiledMail');
    }
}
