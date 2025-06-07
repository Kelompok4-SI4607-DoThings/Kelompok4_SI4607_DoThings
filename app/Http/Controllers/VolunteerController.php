<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use App\Models\VolunteerAdmin;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua volunteer dan program (VolunteerAdmin)
        $volunteers = Volunteer::all();
        $programs = VolunteerAdmin::all();

        // Kirim ke view user.volunteer.index
        return view('user.volunteer.index', compact('volunteers', 'programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = \App\Models\VolunteerAdmin::all();
        return view('user.volunteer.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', // nama program volunteer
            'email' => 'required|email|unique:volunteers,email',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required|in:laki laki,perempuan',
            'agreement' => 'accepted',
        ]);

        \App\Models\Volunteer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'user_id' => auth()->id(), // <-- Tambahkan ini
        ]);

        return redirect()->route('volunteer.index')->with('success', 'Pendaftaran volunteer berhasil!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer)
    {
        return view('user.volunteer.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:volunteers,email,' . $volunteer->id,
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required|in:laki laki,perempuan',
        ]);


        $volunteer->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'gender' => $request->gender,
    ]);

    return redirect()->route('volunteer.index')->with('success', 'Data volunteer berhasil diupdate!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->delete();

        return redirect()->route('volunteer.index')->with('success', 'Volunteer berhasil dihapus');
    }
    public function show($id)
    {
        $program = \App\Models\VolunteerAdmin::findOrFail($id);
        return view('user.volunteer.show', compact('program'));
    }
}