<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;




class AdminController extends BaseController
{


    public function showAdmin($id)
    {
        $admin = \App\Admin::find(Auth::id()); // Assuming you're using admin authentication
        return view('backend.common.navbar', compact('admin'));

    }
    
        public function index()
        {
            // Get the currently authenticated admin user
            $admin = Auth::guard('admin')->user();

            // Return the view and share the admin data with the navbar view
            return view('backend.index')->with('admin', $admin);
        }
            

    // Handle admin login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

             // Fetch the admin details
             $admin = Admin::where('email', $request->email)->first();
             // Store admin details in session or pass it to the view
             session(['admin' => $admin]);

             
            return redirect()->route('admin.dashboard');
        }

        $request->session()->flash('error', 'Invalid email or password.');
        return redirect()->back();
    }

    // Handle admin logout request
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Add a flash message for successful logout
        return redirect()->route('admin.login')->with('status', 'Logged out successfully!');
    }



    // for profile 
     // Show the admin profile with existing data
     public function showProfile() {
        $admin = Auth::guard('admin')->user(); // Use the 'admin' guard to fetch authenticated admin
    
        if (!$admin) {
            return redirect()->route('admin.login'); // Redirect if not authenticated
        }
    
        return view('backend.profilemanage', compact('admin'));
    }

    // Update the admin profile
    public function updateProfile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . Auth::id(),
            'password' => 'nullable|min:6', // Password is optional
            'image' => 'nullable', // validate image
        ]);

        // Get the authenticated admin
        $admin = \App\Admin::find(Auth::id()); // Assuming you're using admin authentication

        // Update admin data
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Update password only if a new one is provided
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }



         // Handle image upload
         if ($request->hasFile('image')) {
            // Generate unique filename
            $imageName = time() . '.' . $request->image->extension();

            // Move the image to the 'admins_image' folder
            $request->image->move(public_path('admins_image'), $imageName);

            // Store the image name in the 'image' column of admins table
            $admin->image = $imageName;
        }


        // Save the changes
        $admin->save();

         // Flash success message to session
        session()->flash('success', 'Profile updated successfully.');

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
