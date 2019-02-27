<?php

namespace App\Mail;

use App\Sale;
use App\Affiliate;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserHasSale extends Mailable
{
    use Queueable, SerializesModels;

    protected $sale;
    protected $affiliate;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Sale $sale, Affiliate $affiliate, User $user)
    {
        $this->sale = $sale;
        $this->affiliate = $affiliate;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.has-sale')
                    ->subject('Vous avez une vente confirmée !')
                        ->with([
                            'sale' => $this->sale,
                            'affiliate' => $this->affiliate,
                            'user' => $this->user,
                        ]);
    }
}
