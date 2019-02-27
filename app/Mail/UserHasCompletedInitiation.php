<?php

namespace App\Mail;

use App\User;
use App\Affiliate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserHasCompletedInitiation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.has-completed-initiation')
                    ->subject('Nous vous remerçions de votre achat !')
                    ->with([
                        'user' => $this->user,
                        'affiliate' => Affiliate::find($this->user->id),
                    ]);
    }
}
