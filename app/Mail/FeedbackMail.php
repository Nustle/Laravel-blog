<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the feedback message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.feedback')
            ->from(['address' => $this->data['email']])
            ->with(['data' => $this->data])
            ->subject('Письмо с блога');
    }
}
