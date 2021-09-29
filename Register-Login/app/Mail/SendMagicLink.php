<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\LoginToken;

class SendMagicLink extends Mailable
{
    use Queueable, SerializesModels;
    private $token;
    private $options;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LoginToken $token, array $options)
    {
        $this->token = $token;
        $this->options = $options;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.magic-link')->with([
            'link' => $this->buildLink()
        ]);
    }


    protected function buildLink()
    {
        return route('auth.magic.login', [
            'token' => $this->token->token,
        ] + $this->options);
    }
}
