<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $feedback; // Property to hold feedback details

    public function __construct($feedback)
    {
        $this->feedback = $feedback; // Assign feedback data
    }

    public function build()
    {
        return $this
            ->subject('Thank You for Your Feedback')
            ->view('emails.feedback') // Path to your email template
            ->with([
                'feedback' => $this->feedback,
            ]);
    }
}
