<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class ContactAnswerConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $locale;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->locale = strtolower($this->user->favorite_language);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.mailers.smtp_admin.sender'), 'BENU')
                    ->subject(trans('emails.message-answer-subject', [], $this->locale))
                    ->view('emails.message-answer');
    }
}
