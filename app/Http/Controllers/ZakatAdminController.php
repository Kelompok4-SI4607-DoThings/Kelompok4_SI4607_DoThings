<?php

namespace App\Http\Controllers;

use App\Models\ZakatAdmin;
use Illuminate\Http\Request;

class ZakatAdminController extends Controller
{
    // Display a listing of the zakat records
    public function index()
    {
        $zakats = ZakatAdmin::all();
        return view('admin.zakatAdmin.index', compact('zakats'));
    }

    // Show the form for creating a new zakat record
    public function create()
    {
        return view('zakatAdmin.create');
    }

    // Store a newly created zakat record
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:Completed,Pending,Not Completed',
        ]);

        ZakatAdmin::create($request->all());

        return redirect()->route('zakatAdmin.index');
    }

    // Delete a zakat record
    public function destroy($id)
    {
        $zakat = ZakatAdmin::findOrFail($id);
        $zakat->delete();

        return redirect()->route('zakatAdmin.index');
    }
}

