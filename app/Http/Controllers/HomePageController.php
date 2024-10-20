<?php

namespace App\Http\Controllers;
use App\Product; // Adjust if necessary based on your namespace

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\welcomeMail;


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
    
    
   
    

}
