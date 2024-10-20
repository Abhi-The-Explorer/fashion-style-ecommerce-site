<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\ShippingDetail;
use App\UserTotal;
use Exception;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
  
    public function store(Request $request)
{
    // Validate shipping details inputs
    $validatedData = $request->validate([
        'full_name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'address_line' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'postcode' => 'required|string|max:20',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'additional_info' => 'required|max:255',
        'total_amount' => 'required|max:255',
    ]);

    try {
        // Convert the total amount to a decimal format
        $totalAmount = str_replace(',', '', $validatedData['total_amount']); // converts into numeric form from strings
        $totalAmount = floatval($totalAmount); // Convert to float

        // Shipping data only
        $shippingData = [
            'user_id' => auth()->id(), // Associate with the logged-in user
            'full_name' => $validatedData['full_name'],
            'country' => $validatedData['country'],
            'address_line' => $validatedData['address_line'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'postcode' => $validatedData['postcode'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'additional_info' => $validatedData['additional_info'],
            // 'total_amount' => $totalAmount, // Use the converted total amount here
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Insert shipping data into the database
        $test = ShippingDetail::create($shippingData); // Using Eloquent's create method for mass assignment

        // Find the user total or create a new record if it doesn't exist
        $userId = auth()->id(); // Get the logged-in user's ID
        $userTotal = UserTotal::firstOrNew(['user_id' => $userId]);

        // Increment the grand total
        $userTotal->grand_total = $totalAmount;

        // Save the updated grand total
        $userTotal->save();

        // Redirect to the previous page with a success message
        return redirect()->route('stripe.checkout');

    } catch (\Exception $exception) {
        dd($exception);
    }

    
}


    // to display shipping data in dashboard
    public function indexAdmin()
    {
        // Paginate carts with their details
        $shippingData = ShippingDetail::paginate(10);

        // Pass the paginated users to the view
        return view('backend.orders.shipping_details', compact('shippingData'));
    }

    // to delete shipping data from admin dashboard
    
    public function deleteAdmin($id)
    {
        // Find the cart by ID
        $shippingData = ShippingDetail::find($id);    //  load details
    

            $shippingData->delete();
    
            return redirect()->back()->with('delete', 'Shipping Data deleted successfully.');
        
    }

}
