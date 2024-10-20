<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamMember; // Make sure to import the TeamMember model

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::paginate(50); // Get all team members with pagination
        return view('backend.teammembers.index', compact('teamMembers')); // Adjust the view path as necessary
    }

    // public function frontindex()
    // {
    //     $teamMembers = TeamMember::paginate(50);
        
    //     return view('frontend.about', compact('teamMembers'));

    // }
    

    public function create() 
    { 
        return view('backend.teammembers.create'); // Adjust the view path as necessary
    }

    public function store(Request $request) 
    { 
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Prepare the team member instance
        $teamMember = new TeamMember();
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/team'), $imageName); // Store in a designated team images folder
            
            // Store the image name in the database
            $teamMember->image = 'images/team/' . $imageName; // Store the path in the database
        }
    
        // Prepare data for database insertion
        $teamMember->name = $request->name;
        $teamMember->position = $request->position;
    
        // Save the team member to the database
        $teamMember->save();
    
        // Redirect or return response
        return redirect()->route('team.index')->with('success', 'Team member added successfully.');
    }
    
    public function edit($id)
    {
        $teamMember = TeamMember::find($id);
        
        // Check if the team member exists
        if (!$teamMember) {
            return redirect()->back()->with('error', 'Team member not found');
        }
    
        return view('backend.teammembers.edit', compact('teamMember')); // Adjust the view path as necessary
    }
    
    public function update(Request $request, $id) 
    { 
        $teamMember = TeamMember::find($id);
        
        if (!$teamMember) {
            return redirect()->back()->with('error', 'Team member not found');
        }
    
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image with size limit
        ]);
    
        // Update team member data
        $teamMember->name = $request->name;
        $teamMember->position = $request->position;
    
        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($teamMember->image) {
                $delete_path = public_path($teamMember->image); // Adjusted to your image path
                if (file_exists($delete_path)) {
                    unlink($delete_path); // Delete old image
                }
            }
    
            // Store new image
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/team'), $filename);
            $teamMember->image = 'images/team/' . $filename; // Update with new image path
        }
    
        // Save the updated team member
        $teamMember->save();
    
        // Flash success message and redirect
        return redirect()->route('team.index')->with('success', 'Team member updated successfully.');
    }
    
    public function delete($id)
    {                          
        $teamMember = TeamMember::find($id);
    
        if ($teamMember) {
            // Remove the image from storage
            if ($teamMember->image) {
                $delete_path = public_path($teamMember->image); // Adjusted to your image path
                if (file_exists($delete_path)) {
                    unlink($delete_path); // Delete image if exists
                }
            }
    
            $teamMember->delete();
            return redirect()->back()->with('success', 'Team member deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Team member not found.');
    }
}
