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
    // public function index()
    // {
    //     // Eager load the order statuses with their related order details
    //     $orders = OrderDetail::with('OrderStatus')->get();
    
    //     // Fetch grand total from the user_totals table
    //     $grandTotal = DB::table('user_totals')
    //         ->select(DB::raw('(grand_total) as total')) // Adjust the field names based on your actual columns
    //         ->first();
    
    //     // Pass the fetched data to the view
    //     return view('backend.orders.index', compact('orders', 'grandTotal'));
    // }


    public function index()
    {
        // Eager load the order statuses with their related order details
        $orders = OrderDetail::with('OrderStatus')->get();
    
        // Group orders by order_id
        $groupedOrders = $orders->groupBy('order_id');
    
        // Prepare an array to hold the final results
        $finalOrders = [];
    
        foreach ($groupedOrders as $orderId => $orderGroup) {
            // Calculate the grand total for the current order_id
            $grandTotal = $orderGroup->sum('total_amount_per_product');
            
            // Prepare the data for display
            $finalOrders[] = [
                'user_ids' => $orderGroup->pluck('user_id')->unique()->toArray(), // Array of user IDs
                'order_id' => $orderId,
                'product_ids' => $orderGroup->pluck('product_id')->unique()->implode(', '),
                'customer_names' => $orderGroup->pluck('name')->unique()->implode(', '),
                'product_names' => $orderGroup->pluck('product_name')->toArray(), // Array for multiple products
                'prices' => $orderGroup->pluck('price')->toArray(), // Array of prices
                'quantities' => $orderGroup->pluck('quantity')->toArray(), // Array of quantities
                'grand_total' => $grandTotal,
                'payment_status' => $orderGroup->first()->OrderStatus->payment_status ?? 'N/A',
                'order_status' => $orderGroup->first()->OrderStatus->order_status ?? 'N/A',
            ];
        }
    
        // Pass the grouped orders to the view
        return view('backend.orders.index', compact('finalOrders'));
    }
    
    


    // public function delete($id)
    // {
    //     // Find the cart by ID
    //     $orders = OrderDetail::find($id); // Eager load details
    
    
    //         // Finally, delete the user
    //         $orders->delete();
    
    //         return redirect()->back()->with('delete', 'Order Data deleted successfully.');
    
    //     return redirect()->back()->with('error', 'data not found.');
    // }


    public function delete($orderId)
    {
        // Find the order details by order_id
        $orderDetails = OrderDetail::where('order_id', $orderId)->get();
    
        if ($orderDetails->isNotEmpty()) {
            // Delete all order details associated with this order_id
            foreach ($orderDetails as $orderDetail) {
                $orderDetail->delete();
            }
            return redirect()->back()->with('delete', 'Order Data deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Data not found.');
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
    

