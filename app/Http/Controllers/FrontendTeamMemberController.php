<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamMember; // Make sure to import the TeamMember model

class FrontendTeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all(); 
        // dd($teamMembers);
        return view('frontend.about', compact('teamMembers'));
    }
}
