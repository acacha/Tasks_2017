<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class CustomEmail.
 *
 * @package App\Mail
 */
class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $body;

    public $subject;

    /**
     * CustomEmail constructor.
     *
     * @param $subject
     * @param $body
     */
    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = $this->body;
        $this->subject($this->subject);
        return $this->markdown('emails.custom', compact("body"));
    }
}
