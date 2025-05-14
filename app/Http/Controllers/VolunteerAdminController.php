<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerAdminController extends Controller
{
    public function create()
    {
        return view('volunteers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'volunteer_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('image')->store('public/volunteers_images');

        // Create new volunteer record
        Volunteer::create([
            'company_name' => $request->company_name,
            'category' => $request->category,
            'volunteer_name' => $request->volunteer_name,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('volunteers.create')->with('success', 'Volunteer added successfully!');
    }
}
