<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\CartDetail; 
use App\OrderDetail; 
use App\OrderStatus; 
use App\ShippingDetail;
use App\UserTotal;



class OrderController extends Controller
{
    public function index()
    {
        // Eager load the order statuses with their related order details
        $orders = OrderDetail::with('OrderStatus')->get();
    
        // Fetch grand total from the user_totals table
        $grandTotal = DB::table('user_totals')
            ->select(DB::raw('SUM(grand_total) as total')) // Adjust the field names based on your actual columns
            ->first();
    
        // Pass the fetched data to the view
        return view('backend.orders.index', compact('orders', 'grandTotal'));
    }


 


    public function delete($id)
    {
        // Find the cart by ID
        $orders = OrderDetail::find($id); // Eager load details
    
    
            // Finally, delete the user
            $orders->delete();
    
            return redirect()->back()->with('delete', 'Order Data deleted successfully.');
    
        return redirect()->back()->with('error', 'data not found.');
    }

// for updating order status
    public function updateStatus(Request $request, $orderStatusId)
    {
    // Validate the input
    $request->validate([
        'order_status' => 'required|in:pending,processed,shipped,delivered',
    ]);

    // Find the OrderStatus by order_id
    $orderStatus = OrderStatus::where('order_id', $orderStatusId)->firstOrFail();

    // Update the order_status
    $orderStatus->update([
        'order_status' => $request->order_status,
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Order status updated successfully.');
    }

}
    

