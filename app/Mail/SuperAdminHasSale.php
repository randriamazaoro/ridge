<?php

namespace App\Mail;

use App\Sale;
use App\Affiliate;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuperAdminHasSale extends Mailable
{
    use Queueable, SerializesModels;

    protected $sale;
    protected $affiliate;
    protected $referral;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Sale $sale, Affiliate $affiliate, Affiliate $referral, User $user)
    {
        $this->sale = $sale;
        $this->affiliate = $affiliate;
        $this->referral = $referral;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.superadmin.has-sale')
                    ->subject('Un nouvel utilisateur vient de terminer sa phase d\'initiation !')
                    ->with([
                            'sale' => $this->sale,
                            'affiliate' => $this->affiliate,
                            'referral' => $this->referral,
                            'user' => $this->user,
                        ]);
    }
}
