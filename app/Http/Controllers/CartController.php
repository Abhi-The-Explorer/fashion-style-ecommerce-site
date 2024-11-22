<?php

namespace App\Http\Controllers;


use App\User;
use App\CartDetail;
use App\Product;
use App\Cart;
use App\ShippingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to use the cart.');
        }
    
        $userId = Auth::id();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Get quantity from input, default to 1 if not set
    
        // Validate the quantity
        if ($quantity < 1) {
            return redirect()->back()->with('error', 'Quantity must be at least 1.');
        }
    
        // Fetch product details (assuming you have a Product model)
        $product = Product::find($productId);
    
        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Check if the product is already in the cart_details for the logged-in user
        $cartDetail = CartDetail::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
    
        if ($cartDetail) {
            // Update quantity if the product is already in the cart
            $cartDetail->quantity += $quantity;
            $cartDetail->save();
        } else {
            // Create a new cart detail entry
            CartDetail::create([
                'user_id' => $userId, // Set user_id
                'product_id' => $productId, // Set product_id
                'name' => Auth::user()->name, // Get the user's name
                'product_name' => $product->name, // Get product name
                'price' => $product->price, // Get product price
                'quantity' => $quantity, // Set quantity
                'image' => $product->image, // Get product image
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    
// it is for to renove the specific item from cart
    // Remove item from cart
    
    public function remove(Request $request, $id)
{
    // Find the item in the cart
    $cartItem = CartDetail::where('id', $id)->first(); // Adjust according to your database structure

    if ($cartItem) {
        // Delete the item from the cart
        $cartItem->delete();
        return redirect()->back()->with('success', 'Item removed successfully.');
    }

    return redirect()->back()->with('error', 'Item not found.');
}

    

    // View the cart
    public function viewCart()
    {
        $cartItems = CartDetail::where('user_id', auth()->user()->id)->with('product')->get(); // Fetch cart details with products
    return view('frontend.cart.cartpage', compact('cartItems')); // Pass cart items to the view
    }

    // Update item quantity in cart
public function update(Request $request)
{
    // Validate quantities input
    $request->validate([
        'quantities' => 'required|array',
        'quantities.*' => 'integer|min:1', // Ensure each quantity is at least 1
    ]);

    // Get the current user's ID
    $userId = Auth::id();

    // Loop through the quantities and update the cart details
    foreach ($request->quantities as $itemId => $quantity) {
        // Find the cart detail by user ID and item ID
        $cartDetail = CartDetail::where('user_id', $userId)
            ->where('id', $itemId)
            ->first();

        if ($cartDetail) {
            // Ensure the requested quantity does not exceed available stock
            $product = Product::find($cartDetail->product_id);
            if ($product && $quantity <= $product->qty) {
                $cartDetail->quantity = $quantity;
                $cartDetail->save();
            }
        }
    }

    return redirect()->route('cart.view')->with('success', 'Cart updated successfully.');
}

 public function clear()
    {
    $userId = Auth::id();

    // Clear all items in the user's cart
    $deletedCount = CartDetail::where('user_id', $userId)->delete();

    if ($deletedCount > 0) {
        return redirect()->route('cart.view')->with('success', 'All items removed from cart successfully.');
    }

    return redirect()->route('cart.view')->with('error', 'Cart is already empty.');
    }


// for passing cartdata into navbar

    public function showCart()
    {

        $cartItems = CartDetail::where('user_id', auth()->user()->id)->with('product')->get(); // Fetch cart details with products
    return view('frontend.common.navbar', compact('cartItems')); // Pass cart items to the view
    }


    public function checkoutpage(Request $request)

    {
                {// Validate the request
            $request->validate([
                'grand_total' => 'required|numeric',
            ]);

            // Get the cart ID
            $cartId = $request->input('cart_id'); // Ensure you have this in your form

            // Find the cart for the given cart ID
            $cart = Cart::find($cartId); // Assuming Cart is the model for the carts table

            if ($cart) {
                // Update the total_amount field in the carts table
                $cart->total_amount = $request->input('grand_total');
                
                if ($cart->save()) {
                    return view('frontend.checkout');
                } else {
                    return redirect()->back()->with('error', 'Failed to store grand total. Please try again.');
                }
            } else {
                return redirect()->back()->with('error', 'Cart not found.');
            }
                }
    }
     

public function checkout(Request $request)
    {
        // // Validate the incoming request
        // $request->validate([
        //     'grand_total' => 'required|numeric',
        // ]);

        // // Create a new shipping detail entry
        // ShippingDetail::create([
        //     'user_id' => auth()->id(), // Assuming the user is authenticated
        //     'total_amount' => $request->grand_total,
        //     // Include other necessary fields here if needed
        // ]);

        // Redirect to the checkout view
         // Fetch cart details with products for the authenticated user
    $cartItems = CartDetail::where('user_id', auth()->user()->id)->with('product')->get();

    // Pass cart items to the checkout view
    return view('frontend.checkout', compact('cartItems'));

    }




    // for admin dashboard data display

      // to display users in dashboard
      public function indexAdmin()
      {
          // Paginate carts with their details
          $carts = CartDetail::paginate(100);

          // Pass the paginated users to the view
          return view('backend.carts.index', compact('carts'));
      }
      
      
  
      public function showAdmin($id)
      {
        $carts = CartDetail::findOrFail($id); // Fetch the carts by ID
      
          // Pass both user and user details to the view
          return view('backend.carts.cartdetails', compact('carts'));
      }


        // to delete carts data from admin dashboard
    public function deleteAdmin($id)
    {
        // Find the cart by ID
        $carts = CartDetail::find($id); // Eager load details
    
        if ($carts) {
            // Remove the image from storage if it exists
            if ($carts && $carts->image) {
                $delete_path = public_path('storage/' . $carts->image); // Adjusted to your image path
                if (file_exists($delete_path)) {
                    unlink($delete_path); // Delete image if exists
                }
            }
    
            // Delete carts details if they exist
            if ($carts->details) {
                $carts->details->delete();
            }
    
            // Finally, delete the user
            $carts->delete();
    
            return redirect()->back()->with('delete', 'Cart Data deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'data not found.');
    }
    


}