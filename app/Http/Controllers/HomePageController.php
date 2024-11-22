<?php

namespace App\Http\Controllers;
use App\Product; // Adjust if necessary based on your namespace

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\welcomeMail;
use Illuminate\Support\Facades\DB;
use App\OrderDetail; 
use App\User; 
use App\Feedback; 




class HomePageController extends Controller
{
    
    public function index(Request $request)
    {
        // Get the current page, default to 1
        $page = $request->get('page', 1);
    
        // Cache the full product list for 60 minutes and then paginate in memory
        $products = Cache::remember('products_all', 60, function () {
            return Product::select('id', 'name', 'price', 'image', 'category','description', 'qty', 'sku')
                ->get(); // Fetch all products with only the necessary fields
        });
    
        // Paginate the results in memory
        $paginatedProducts = $products->forPage($page, 8); // Manually paginate (8 products per page)
    
        // Create a pagination object to work with Blade pagination
        $products = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedProducts, // The items for the current page
            $products->count(), // Total number of items
            8, // Items per page
            $page, // Current page
            ['path' => $request->url()] // URL path for pagination links
        );
    
        // Return the view with the paginated products
        return view('frontend.index', compact('products'));
    }
    
    

    public function ProductsIndex()
    {
        $products = Product::paginate(9); // Adjust the number as needed
    
        // Get unique categories from the products table
        $categories = Product::select('category')->distinct()->get();
    
        return view('frontend.shop', compact('products', 'categories'));
    }

    public function OrderStatus()
    {

         // Check if the user is logged in
        if (!auth()->check()) {
            // If the user is not logged in, redirect to the login page with a message
            return redirect()->route('login')->with('message2', 'You must be logged in to view your order status.');
        }

        // Get the logged-in user's ID
        $userId = auth()->user()->id;
    
        // Eager load related order statuses with order details for the logged-in user
        $orders = OrderDetail::with('orderStatus')
            ->where('user_id', $userId)  // Filter orders by the logged-in user ID
            ->get();
    
        // Group orders by order_id
        $groupedOrders = $orders->groupBy('order_id');
    
        // Calculate and add grand total for each order group
        foreach ($groupedOrders as $orderId => $orderGroup) {
            // Calculate the grand total for the current order group
            $grandTotal = $orderGroup->sum('total_amount_per_product');  // Replace with actual column name
    
            // Store the calculated grand total in each order in the group
            foreach ($orderGroup as $order) {
                $order->grand_total = $grandTotal;
            }
        }
    
        // Fetch the grand total for the user from the user_totals table (optional)
        $userGrandTotal = DB::table('user_totals')
            ->where('user_id', $userId)  // Ensure we get the total for the logged-in user
            ->select(DB::raw('SUM(grand_total) as total'))
            ->first();
    
        // Pass the grouped data and grand total to the view
        return view('frontend.order-status', compact('groupedOrders', 'userGrandTotal'));
    }
    
   


    // to display dashboard index content data

    public function dashboard()
    {
        // Fetch counts for dashboard statistics
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalFeedbacks = Feedback::count();
        $totalOrders = OrderDetail::count();
    
        // Fetch the last 10 products based on creation date
        $newProducts = Product::orderBy('created_at', 'desc')->take(8)->get();
    
        // Return the dashboard view with the updated data
        return view('backend.index', compact('totalUsers', 'totalProducts', 'totalFeedbacks', 'totalOrders', 'newProducts'));
    }
    
    

}
