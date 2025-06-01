<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VolunteerAdmin;
use Illuminate\Support\Facades\Storage;

class VolunteerAdminController extends Controller
{
    public function index() {
        $volunteers = VolunteerAdmin::all();
        return view('admin.volunteerAdmin.index', compact('volunteers'));
    }

    public function create() {
        return view('admin.volunteerAdmin.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'company_name' => 'required',
            'category' => 'required',
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('volunteer_images', 'public');
        }

        VolunteerAdmin::create($data);
        return redirect()->route('admin.volunteerAdmin.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(VolunteerAdmin $volunteeradmin) {
        return view('admin.volunteerAdmin.show', compact('volunteeradmin'));
    }

    public function edit(VolunteerAdmin $volunteeradmin) {
        return view('admin.volunteerAdmin.edit', compact('volunteeradmin'));
    }

    public function update(Request $request, VolunteerAdmin $volunteeradmin) {
        $data = $request->validate([
            'company_name' => 'required',
            'category' => 'required',
            'name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($volunteeradmin->image_path) {
                Storage::disk('public')->delete($volunteeradmin->image_path);
            }
            $data['image_path'] = $request->file('image')->store('volunteer_images', 'public');
        }

        $volunteeradmin->update($data);
        return redirect()->route('admin.volunteerAdmin.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(VolunteerAdmin $volunteeradmin) {
        if ($volunteeradmin->image_path) {
            Storage::disk('public')->delete($volunteeradmin->image_path);
        }
        $volunteeradmin->delete();
        return redirect()->route('admin.volunteerAdmin.index')->with('success', 'Data berhasil dihapus.');
    }

    public function registrants($id)
    {
        $volunteer = VolunteerAdmin::findOrFail($id);
        $registrants = \App\Models\Volunteer::where('name', $volunteer->name)->get();
        return view('admin.volunteerAdmin.registrants', compact('volunteer', 'registrants'));
    }
}