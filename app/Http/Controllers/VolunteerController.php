<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteers = Volunteer::all();
        return view('user.volunteer.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.volunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:volunteers',
        'phone' => 'required',
        'address' => 'required',
        'gender' => 'required|in:laki laki,perempuan',
        'agreement' => 'accepted',
    ]);

    Volunteer::create($request->except('agreement'));

    return redirect()->route('volunteer.index')->with('success', 'Volunteer berhasil ditambahkan!');
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
    
}
