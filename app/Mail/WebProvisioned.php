<?php

namespace App\Mail;

use App\Models\WebProvision;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WebProvisioned extends Mailable
{
    use Queueable, SerializesModels;
    public $provision;

    /**
     * Create a new message instance.
     *
     * @param WebProvision $provision
     */
    public function __construct(WebProvision $provision)
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
        return $this->view('emails.webprovision');
    }
}
