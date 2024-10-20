<?php
namespace App\Mail;

use App\ShippingDetail;
use App\CartDetail;
use App\UserTotal;
use App\Services\TwilioService; // Import the TwilioService
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $shippingDetails;
    public $orderDetails;
    public $grandTotal; // Add grandTotal as a public property


    
    public function __construct($user,$grandTotal)
    {
        $this->user = $user;

        // Fetch shipping details based on user_id
        $this->shippingDetails = ShippingDetail::where('user_id', $this->user->id)->first();

        // Fetch order details based on user_id
        $this->orderDetails = CartDetail::where('user_id', $this->user->id)->get();

        $this->grandTotal = $grandTotal; // Store grandTotal for later use

        // Send SMS notification after payment is processed
        // $this->sendSmsNotification();
    }

    public function build()
    {
        return $this
            ->subject('Payment Successful')
            ->view('emails.payment_success') // Path to your email template
            ->with([
                'shippingDetails' => $this->shippingDetails,
                'orderDetails' => $this->orderDetails,
                'grandTotal' => $this->grandTotal, 
            ]);
    }

    protected function sendSmsNotification()
{
    $twilio = new TwilioService();

    // Fetch total amount and ensure it's formatted correctly
    $totalAmount = number_format($this->shippingDetails->total_amount, 2); // Format total amount to 2 decimal places

    // Get product names and quantities
    $orderDetails = $this->orderDetails; // Assuming this contains the order details

    // Create a formatted string for product names and quantities
    $productMessages = $orderDetails->map(function($item) {
        return $item->product_name . " (X " . $item->quantity . ")";
    })->implode(', '); // This formats the product name with its quantity

    // Construct the message
    $message = "Your payment of $$totalAmount has been successfully done. You will receive your $productMessages as soon as possible. Thank you for shopping with us.";

    // Hardcoded phone number to send SMS to
    $hardcodedPhoneNumber = "+9779817222443"; // Replace with the desired phone number

    // Send SMS to the hardcoded number
    try {
        $twilio->sendSms($hardcodedPhoneNumber, $message); // No longer need to pass 'from'
    }
     catch(\Exception $exception){
                dd($exception);
            
        }
    }
    
}
