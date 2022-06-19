<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMailForQueuing extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@coffee.kspark.link', 'support')
            ->subject('DNSEver Coffee Order App')
            ->view('mail.invitation')
            ->with('name', $this->details->name)
            ->with('Invitation_link', $this->details->Invitation_link);
    }
}
