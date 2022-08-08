<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Order;
use App\Models\User;

class OrderReadyConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user;
    public $locale;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->user = $this->order->user;
        $this->locale = strtolower($this->user->favorite_language);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp.sender'), 'BENU')->subject(trans("emails.order-ready-subject", [], $this->locale))->view('emails.order-ready');
    }
}
