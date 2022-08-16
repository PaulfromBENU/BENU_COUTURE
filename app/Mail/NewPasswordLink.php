<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPasswordLink extends Mailable
{
    use Queueable, SerializesModels;

    public $locale;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->locale = session('locale');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp.sender'), 'BENU')
                    ->subject("Test password reset")
                    ->view('emails.password-reset-link');
    }
}
