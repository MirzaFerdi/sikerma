<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MouController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mous = Mou::with('dudi')->get();
        $dudis = $mous->pluck('dudi')->unique();
        return view('mou', compact('mous', 'dudis'));
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
            'dudi_id' => 'required|exists:dudi,id',
            'file_mou' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'no_mou' => 'required|string|max:255',
            'judul_dokumen' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $mou = new Mou();
        $mou->id_dudi = $request->dudi_id;
        $mou->no_mou = $request->no_mou;
        $mou->judul_dokumen = $request->judul_dokumen;
        $mou->tanggal_mulai = $request->tanggal_mulai;
        $mou->tanggal_selesai = $request->tanggal_selesai;
        if ($request->hasFile('file_mou')) {
            $filename = time() . '_' . $request->file('file_mou')->getClientOriginalName();
            $request->file('file_mou')->storeAs('public/file/mou', $filename);
            $mou->file_mou = $filename;
        }
        $mou->save();

        return redirect()->route('mou.index')->with('success', 'MOU created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mou $mou)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mou $mou)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mou $mou)
    {
        $request->validate([
            'dudi_id' => 'required|exists:dudi,id',
            'file_mou' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'no_mou' => 'required|string|max:255',
            'judul_dokumen' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $mou->id_dudi = $request->dudi_id;
        $mou->no_mou = $request->no_mou;
        $mou->judul_dokumen = $request->judul_dokumen;
        $mou->tanggal_mulai = $request->tanggal_mulai;
        $mou->tanggal_selesai = $request->tanggal_selesai;


        if ($request->hasFile('file_mou')) {
            // Delete old file if exists
            if ($mou->file_mou) {
                Storage::delete('public/file_mous/' . $mou->file_mou);
            }
            $filename = time() . '_' . $request->file('file_mou')->getClientOriginalName();
            $request->file('file_mou')->storeAs('public/file_mous', $filename);
            $mou->file_mou = $filename;
        }

        $mou->save();

        return redirect()->route('mou.index')->with('success', 'MOU updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mou $mou)
    {
        // Delete the file if it exists
        if ($mou->file_mou) {
            Storage::delete('public/file_mous/' . $mou->file_mou);
        }

        $mou->delete();

        return redirect()->route('mou.index')->with('success', 'MOU deleted successfully.');
    }
}
