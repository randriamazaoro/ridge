<?php

namespace App\Mail;

use App\TransferRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuperAdminHasTransferRequest extends Mailable
{
    use Queueable, SerializesModels;

    protected $transfer_request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TransferRequest $transfer_request)
    {
        $this->transfer_request = $transfer_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.superadmin.has-transfer-request')
                    ->with([
                            'transfer_request' => $this->transfer_request,
                        ]);
    }
}
