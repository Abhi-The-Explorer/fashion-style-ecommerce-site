<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\UserDetails;

class MyaccountController extends Controller
{
    public function showAccount()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Retrieve user details or initialize an empty UserDetails object
        $userDetails = UserDetails::where('user_id', $user->id)->first();
        if (!$userDetails) {
            $userDetails = new UserDetails();
        }
        
        return view('frontend.my-account', [
            'user' => $user,
            'userDetails' => $userDetails
        ]);
    }

    public function updateAccount(Request $request)
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Retrieve user details or initialize an empty UserDetails object
        $userDetails = UserDetails::where('user_id', $user->id)->first();
        if (!$userDetails) {
            $userDetails = new UserDetails();
            $userDetails->user_id = $user->id;
        }
        
        // Validate input
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'country' => 'nullable|string|max:255',
            'street_address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        // Update user information
        if ($request->filled('name')) {
            $user->name = $request->input('name');
        }
        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }
        $user->save();

        // Update or create user details
        $userDetails->country = $request->input('country');
        $userDetails->street_address = $request->input('street_address');
        $userDetails->city = $request->input('city');
        $userDetails->state = $request->input('state');
        $userDetails->phone = $request->input('phone');

        
        // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($userDetails->image && Storage::exists('public/' . $userDetails->image)) {
            Storage::delete('public/' . $userDetails->image);
        }
        
        // Store new image
        $imagePath = $request->file('image')->store('images', 'public');
        $userDetails->image = $imagePath;
    
    }
                // Save user details
        $userDetails->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
