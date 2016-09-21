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
    public $images;

    /**
     * Create a new message instance.
     *
     * @param VpsProvision $provision
     */
    public function __construct(VpsProvision $provision)
    {
        $this->provision = $provision;
        $this->images = [
            'logo' => public_path()."/assets/img/logo_100x100.png",
            'facebook' => public_path()."/assets/img/facebook.png",
            'twitter' => public_path()."/assets/img/twitter.png",
            'google' => public_path()."/assets/img/google-plus.png"
        ];
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
