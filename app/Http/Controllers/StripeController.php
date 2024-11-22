<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\ShippingDetail; // Import the ShippingDetails model
use App\CartDetail; // Import the CartDetails
use App\OrderDetail; // Import the CartDetails
use App\OrderStatus; // Import the CartDetails
use App\Product; // Import the CartDetails
use App\UserTotal; // Import the CartDetails
use Illuminate\Support\Facades\Mail; // For sending emails
use Illuminate\Support\Facades\DB;
use App\Mail\PaymentSuccessMail; // Import the PaymentSuccessMail class

class StripeController extends Controller
{
    public function checkout(Request $request)
{
    // Fetch user-specific shipping details and cart items
    $user_id = auth()->id(); // Get the logged-in user ID
    
    // Fetch shipping details for the current user
    $shipping = ShippingDetail::where('user_id', $user_id)->firstOrFail();
    
    // Fetch all cart items for the current user
    $cartItems = CartDetail::where('user_id', $user_id)->with('product')->get();
    
    // If cartItems or shipping details are missing, handle it (optional)
    if ($cartItems->isEmpty()) {
        return back()->withErrors(['error' => 'Your cart is empty']);
    }

    // Set your Stripe secret key
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // Define the conversion rate (for example, 1 USD = 80 INR)
    $conversionRate = 80; // Update this based on the current conversion rate

    try {
        // Define your conversion rate (1 INR = 0.012 USD for example)
        $conversionRate = 0.012;
    
        // Prepare line items for Stripe Checkout from the cart items
        $line_items = [];
        foreach ($cartItems as $item) {
            // Convert INR price to USD and calculate the amount in cents
            $priceInUSD = round(($item->product->price * $conversionRate) * 100); // Amount in cents
            $line_items[] = [
                'price_data' => [
                    'currency' => 'usd', // Set currency to USD
                    'product_data' => [
                        'name' => $item->product->name, // Product name from cart
                    ],
                    'unit_amount' => $priceInUSD, // Amount in cents
                ],
                'quantity' => $item->quantity,
            ];
        }
    
        // Create a Stripe Checkout Session
        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items, // The line items we created from the cart
            'client_reference_id' => $user_id, // Reference the user for tracking purposes
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
            'metadata' => [
                'user_name' => $shipping->full_name, // Useful for tracking
                'total_amount' => round($cartItems->sum(function ($item) use ($conversionRate) {
                    return ($item->product->price * $conversionRate); // Total amount in USD
                }) * 100), // Total amount in cents
            ],
        ]);
    
      

        // Redirect to Stripe Checkout page
        return redirect($checkout_session->url);
    } catch (\Exception $e) {
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}

public function generateOrderId()
{
    // Generate a unique order ID
    return strtoupper(uniqid('ORDER_')); // Prefix with "ORDER_" and make it uppercase
}

public function success()
{
    // Payment was successful
    $user = auth()->user(); // Get the authenticated user
    $amount = session('amount'); // Get the amount (store it in session during checkout)
    
    // Fetch the grand total from the user_totals table
    $userTotal = DB::table('user_totals')->where('user_id', $user->id)->first();
    $grandTotal = $userTotal ? $userTotal->grand_total : 0; // Fetch the grand total value safely

    // Fetch the cart details for the authenticated user
    $cartItems = CartDetail::where('user_id', $user->id)->get(); // Fetch the user's cart items

    // Generate a unique order ID once for this transaction
    $orderId = $this->generateOrderId();

    // Use DB transaction to ensure order details are created atomically
    DB::transaction(function () use ($user, $cartItems, $orderId) {
        // Fetch the shipping details for the user
        $shippingDetails = ShippingDetail::where('user_id', $user->id)->first();

        foreach ($cartItems as $item) {
            // Fetch the product details based on the product_id
            $product = Product::find($item->product_id);

            if ($product) {
                // Calculate the total amount per product
                $totalAmountPerProduct = $product->price * $item->quantity;

                // Create an order details record for each cart item
                OrderDetail::create([
                    'user_id' => $user->id,
                    'product_id' => $item->product_id,
                    'name' => $user->name,
                    'product_name' => $product->name,
                    'quantity' => $item->quantity,
                    'price' => $product->price,
                    'total_amount_per_product' => $totalAmountPerProduct,
                    'image' => $item->image,
                    'order_id' => $orderId,
                ]);
            }
        }

        // Insert into the order_status table once after all order details are created
        OrderStatus::create([
            'order_id' => $orderId,
            'user_id' => $user->id,
            'payment_status' => 'completed',
            'order_status' => 'pending',
        ]);

       
    });

    // Send the email after successful transaction with the grand total
    Mail::to($user->email)->send(new PaymentSuccessMail($user, $grandTotal));

    // Clear the cart after successful order creation
    CartDetail::where('user_id', $user->id)->delete();

    return view('frontend.stripe.success');
}

    public function cancel()
    {
        // Payment was canceled
        return view('frontend.stripe.fail');



          // Optionally, send SMS notification
    // You can call your sendSmsNotification() method here if needed
    $this->sendSmsNotification(); 
    }


}



