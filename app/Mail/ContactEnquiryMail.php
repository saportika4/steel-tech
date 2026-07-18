<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactEnquiryMail extends Mailable
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this
            ->subject('New Contact Enquiry')
            ->replyTo(
                $this->data['email'],
                $this->data['fname'].' '.$this->data['lname']
            )
            ->view('emails.contact-enquiry');
    }
}
