<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class UserInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function build()
    {
        $pdf = Pdf::loadView('emails.invoice_pdf', ['payment' => $this->payment]);      
					
		return $this->subject('Thank You for Your Purchase – Invoice & Lead Details Attached')
		->view('emails.invoice_body') // your blade view
		->attachData($pdf->output(), 'invoice.pdf');
    }
}
