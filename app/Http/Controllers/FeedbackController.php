<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; // Correct import for Auth
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;
class FeedbackController extends Controller
{

    // Function to return the contact view
    public function showContactForm()
    {
    
        // Return the view for 'frontend/contact'
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        // $user = Auth::user(); // Fetch authenticated user
        //  $userId = $user->id; // Get the user's user_id

        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_no' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        // $validatedData['user_id'] = $userId;

        // Store feedback into the database and return the created instance
        $feedback = Feedback::create($validatedData);

        // Send the feedback confirmation email
        Mail::to($feedback->email)->send(new FeedbackMail($feedback));

        // Redirect back with a success message
        return back()->with('success', 'Feedback submitted successfully! We will response you will soon');
    }


      // to display feedback data in dashboard
      public function indexAdmin()
      {
          // Paginate feedback data with their details
          $feedback = Feedback::paginate(100);
  
        
          return view('backend.feedback', compact('feedback'));
          
      }
  
      // to delete feedback data from admin dashboard
      
      public function deleteAdmin($id)
      {
         
          $feedback = Feedback::find($id);    //  load details
      
  
              $feedback->delete();
      
              return redirect()->back()->with('delete', 'Feedback Data deleted successfully.');
          
      }

}
