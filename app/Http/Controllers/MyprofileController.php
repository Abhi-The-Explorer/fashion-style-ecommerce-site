<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin; // Assuming you have an Admin model

class MyprofileController extends Controller
{
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
        $admin = Auth::guard('admin')->user();

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