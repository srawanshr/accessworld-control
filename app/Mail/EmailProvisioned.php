<?php

namespace App\Mail;

use App\Models\EmailProvision;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailProvisioned extends Mailable
{
    use Queueable, SerializesModels;
    public $provision;

    /**
     * Create a new message instance.
     *
     * @param EmailProvision $provision
     */
    public function __construct(EmailProvision $provision)
    {
        $this->provision = $provision;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailprovision');
    }
}
