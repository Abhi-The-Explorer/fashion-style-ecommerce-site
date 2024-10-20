<?php

// app/Services/TwilioService.php

namespace App\Services;

require_once 'C:\xampp\htdocs\ecommerce\vendor\autoload.php'; // Update this path

use Twilio\Rest\Client;

class TwilioService
{
    protected $sid;
    protected $token;
    protected $from;

    public function __construct()
    {
        $this->sid = env('TWILIO_SID'); // Twilio Account SID from .env
        $this->token = env('TWILIO_AUTH_TOKEN'); // Twilio Auth Token from .env
        $this->from = env('TWILIO_FROM'); // Twilio Phone Number from .env
    }

    public function sendSms($to, $message)
    {
        // Create a new Twilio Client
        $twilio = new Client($this->sid, $this->token);

        // Send the SMS
        return $twilio->messages->create(
            $to,
            [
                'from' => $this->from, // Use the stored Twilio number
                'body' => $message,
            ]
        );
    }
}
