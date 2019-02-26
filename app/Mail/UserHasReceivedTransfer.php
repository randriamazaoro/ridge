<?php

namespace App\Mail;

use App\TransferRequest;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserHasReceivedTransfer extends Mailable
{
    use Queueable, SerializesModels;

    protected $transfer_request;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TransferRequest $transfer_request, User $user)
    {
        $this->transfer_request = $transfer_request;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.has-received-transfer')
                    ->with([
                            'user' => $this->user,
                            'transfer_request' => $this->transfer_request,
                        ]);
    }
}
