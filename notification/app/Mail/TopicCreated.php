<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TopicCreated extends Mailable
{
    use Queueable, SerializesModels;
    private $first_name;
    private $last_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->first_name  = 'mehrdad';
        $this->last_name = 'saami';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.topic-created')->with([
            'full_name' => $this->first_name . $this->last_name
        ]);
    }
}
