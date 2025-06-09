<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dudis = Dudi::all();
        $admins = Dudi::with('admin')->get();
        $koordinators = Dudi::with('koordinator')->get();

        return view('dudi', compact('dudis', 'admins', 'koordinators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dudi' => 'required|string|max:255',
            'nama_contact_person' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:15',
            'catatan' => 'nullable|string|max:500',
            'alamat' => 'required|string|max:255',
        ]);

        $dudi = new Dudi();
        $dudi->id_admin = 1;
        $dudi->id_koordinator = auth()->user()->id;
        $dudi->nama_dudi = $request->nama_dudi;
        $dudi->nama_contact_person = $request->nama_contact_person;
        $dudi->email = $request->email;
        $dudi->no_telp = $request->no_telp;
        $dudi->alamat = $request->alamat;
        $dudi->catatan = $request->catatan ?? '';
        $dudi->save();

        return redirect()->route('dudi.index')->with('success', 'Dudi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dudi $dudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dudi $dudi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dudi $dudi)
    {
        $request->validate([
            'nama_dudi' => 'required|string|max:255',
            'nama_contact_person' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:15',
            'catatan' => 'nullable|string|max:500',
            'alamat' => 'required|string|max:255',
        ]);

        $dudi->nama_dudi = $request->nama_dudi;
        $dudi->nama_contact_person = $request->nama_contact_person;
        $dudi->email = $request->email;
        $dudi->no_telp = $request->no_telp;
        $dudi->alamat = $request->alamat;
        $dudi->catatan = $request->catatan ?? '';
        $dudi->status = 'request';
        $dudi->save();

        return redirect()->route('dudi.index')->with('success', 'Dudi updated successfully.');
    }

    public function updateStatus(Request $request, Dudi $dudi)
    {
        $request->validate([
            'status_validasi' => 'required|in:accepted,rejected',
        ]);

        $dudi->status = $request->status_validasi;
        $dudi->save();

        return redirect()->route('dudi.index')->with('success', 'Dudi status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dudi $dudi)
    {
        $dudi->delete();
        return redirect()->route('dudi.index')->with('success', 'Dudi deleted successfully.');
    }
}
