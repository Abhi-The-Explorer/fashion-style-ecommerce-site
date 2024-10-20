<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class ProductsController extends Controller
{


    // public function __construct()
    // {
    //     // Fetch the currently authenticated admin
    //     $admin = \App\Admin::find(Auth::id());
        
    //     // Share the admin data with all views rendered by this controller
    //     view()->share('admin', $admin);
    // }

    
    // public function showAdmin($id)
    // {
    //     $admin = \App\Admin::find(Auth::id()); // Assuming you're using admin authentication
    //     return view('backend.common.navbar', compact('admin'));

    // }

    public function show($id)
    {
        
        $product = Product::findOrFail($id); // Fetch the product by ID
        return view('products.productdetails', compact('product')); // Pass the product to the view
    }
    



    public function index()
    {
        
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function front()
    {
        // Fetch all products
        $products = Product::all(); // or use paginate() for pagination
        return view('frontend.index', compact('products'));
    }

    public function create() 
    { 
        return view('products.create'); 
    }

    public function store(Request $request) 
    { 
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
            // 'image' => 'required', // Ensure it is an image
        ]);
    
        // Prepare the product instance
        $product = new Product();
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            // Store the image name in the database
            $product->image = $imageName;
        }
    
        // Prepare data for database insertion
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
    
        // Save the product to the database
        $product->save();
    
        // Redirect or return response
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }
    
    public function edit($id)
    {
        $product = Product::find($id);
        
        // Check if the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, $id) 
    { 
        $product = Product::find($id);
        
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
    
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku,' . $id . '|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
            // 'image' => 'nullable|image|max:2048', // Optional image with size limit
        ]);
    
        // Update product data
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
    
        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image) {
                $delete_path = public_path('/uploads/' . $product->image);
                if (file_exists($delete_path)) {
                    unlink($delete_path); // Delete old image
                }
            }
    
            // Store new image
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $filename);
            $product->image = $filename; // Update with new image path
        }
    
        // Save the updated product
        $product->save();
    
        // Flash success message and redirect
        $request->session()->flash('update', 'Product updated successfully');
        return redirect()->route('products.index');
    }
    
    public function delete($id)
    {                          
        $product = Product::find($id);
    
        if ($product) {
            // Remove the image from storage
            if ($product->image) {
                $delete_path = public_path('images/' . $product->image); // Adjusted to your image path
                if (file_exists($delete_path)) {
                    unlink($delete_path); // Delete image if exists
                }
            }
    
            $product->delete();
            return redirect()->back()->with('success', 'Product deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Product not found.');
    }
}    