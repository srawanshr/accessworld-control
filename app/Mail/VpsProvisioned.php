<?php

namespace App\Mail;

use App\Models\VpsProvision;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VpsProvisioned extends Mailable
{
    use Queueable, SerializesModels;
    public $provision;

    /**
     * Create a new message instance.
     *
     * @param VpsProvision $provision
     */
    public function __construct(VpsProvision $provision)
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
        return $this->view('emails.vpsprovision');
    }
}
