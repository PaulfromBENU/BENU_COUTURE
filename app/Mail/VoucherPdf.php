<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Voucher;

class VoucherPdf extends Mailable
{
    use Queueable, SerializesModels;

    public $voucher;
    public $locale;
    public $pdf_voucher;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Voucher $voucher, $pdf_voucher)
    {
        $this->voucher = $voucher;
        $this->pdf_voucher = $pdf_voucher;
        $this->locale = session('locale');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'BENU')
                    ->subject('Votre bon cadeau BENU')
                    ->view('emails.voucher-pdf')
                    ->attachData($this->pdf_voucher->output(), 'BENU_Voucher_'.$this->voucher->unique_code.'.pdf', [
                    'mime' => 'application/pdf',
                ]);
    }
}
