<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserHasCompletedRegistration extends Mailable
{
    use Queueable, SerializesModels;

    protected $url;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.has-completed-registration')
                        ->with([
                            'url' => $this->url,
                        ])
                        ->subject('Bonjour et bienvenue chez Ridge !');
    }
}
