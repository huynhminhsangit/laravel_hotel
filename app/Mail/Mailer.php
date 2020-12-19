<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $templateMail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $templateMail)
    {
        $this->details = $details;
        $this->templateMail = $templateMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->templateMail) {
            case 'subscribe-email':
                return $this
            // ->from($address = 'noreply@domain.com', $name = 'ZendVN')
                    ->subject($this->details['subject'])
                    ->view('admin.pages.setting.mail.template_subscribe', ['detail' => $this->details]);
                break;
            case 'contact-email':
                return $this->subject($this->details['subject'])
                    ->view('admin.pages.setting.mail.template_default', ['detail' => $this->details])
                    ->bcc($this->details['bcc']);
                break;
            case 'reservation-confirm-email':
                return $this->subject($this->details['subject'])
                    ->view('admin.pages.setting.mail.template_reservation_confirm', ['detail' => $this->details])
                    ->bcc($this->details['bcc']);
                break;

            default:
                # code...
                break;
        }

    }
}
