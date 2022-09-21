<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseConfirm extends Mailable
{
    use Queueable, SerializesModels;
    public $order_details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_details)
    {
        $this->order_details = $order_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frondend.mail.purchaseconfirm', ['order_details' => $this->order_details]);
    }
}
