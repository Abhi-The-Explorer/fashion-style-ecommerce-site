<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // Ensure correct namespace for User model
use App\UserDetails; // Ensure correct namespace for User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{


    // to display users in dashboard
    public function index()
    {
        // Paginate users with their details
        $users = User::with('details')->paginate(100); // Adjust the number as needed
    
        // Pass the paginated users to the view
        return view('backend.users.index', compact('users'));
    }
    
    

    public function show($id)
    {
        // Fetch the user by ID along with their details using eager loading
        $users = User::with('details')->findOrFail($id); 
    
        // Pass both user and user details to the view
        return view('backend.users.userdetails', compact('users'));
    }
    

    // to delete users data from admin dashboard
    public function delete($id)
    {
        // Find the user by ID
        $users = User::with('details')->find($id); // Eager load details
    
        if ($users) {
            // Remove the image from storage if it exists
            if ($users->details && $users->details->image) {
                $delete_path = public_path('storage/' . $users->details->image); // Adjusted to your image path
                if (file_exists($delete_path)) {
                    unlink($delete_path); // Delete image if exists
                }
            }
    
            // Delete user details if they exist
            if ($users->details) {
                $users->details->delete();
            }
    
            // Finally, delete the user
            $users->delete();
    
            return redirect()->back()->with('delete', 'User deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'User not found.');
    }
    



    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home')->with('message', 'You are already registered.');
        }
        
        // Validate user registration inputs
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username', 
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
           
        ]);
    
        // User data only
        $data = [
            'username' => $request->username, 
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        // Insert user data into the database
        User::create($data); 
    
        // Redirect to login page with success message
        $request->session()->flash('success', 'Account created successfully');

        // Redirect to the login page
        return redirect()->route('login');
    }
}
