<?php

namespace App\Http\Controllers;

use App\Models\IaPks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IaPksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iaPks = IaPks::with('dudi')->get();

        return view('ia_pks', compact('iaPks'));
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
            'id_dudi' => 'required|exists:mou,id',
            'no_dokumen' => 'required|string|max:255',
            'judul_dokumen' => 'required|string|max:255',
            'jenis_dokumen' => 'required|string|max:50',
            'jenis_kategori' => 'required|string|max:50',
            'file_pks' => 'required|file|mimes:pdf|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $iaPks = new IaPks();
        $iaPks->id_dudi = $request->id_dudi;
        $iaPks->no_dokumen = $request->no_dokumen;
        $iaPks->judul_dokumen = $request->judul_dokumen;
        $iaPks->jenis_dokumen = $request->jenis_dokumen;
        $iaPks->jenis_kategori = $request->jenis_kategori;
        $iaPks->tanggal_mulai = $request->tanggal_mulai;
        $iaPks->tanggal_selesai = $request->tanggal_selesai;
        if ($request->hasFile('file_pks')) {
            $file = $request->file('file_pks');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('file/ia_pks', $filename, 'public');
            $iaPks->file_pks = $filename;
        }
        $iaPks->save();

        return redirect()->route('ia-pks.index')->with('success', 'IA PKS created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IaPks $iaPks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IaPks $iaPks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IaPks $iaPks)
    {
        $request->validate([
            'id_dudi' => 'required|exists:mou,id',
            'no_dokumen' => 'required|string|max:255',
            'judul_dokumen' => 'required|string|max:255',
            'jenis_dokumen' => 'required|string|max:50',
            'jenis_kategori' => 'required|string|max:50',
            'file_pks' => 'nullable|file|mimes:pdf|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $iaPks->id_dudi = $request->id_dudi;
        $iaPks->no_dokumen = $request->no_dokumen;
        $iaPks->judul_dokumen = $request->judul_dokumen;
        $iaPks->jenis_dokumen = $request->jenis_dokumen;
        $iaPks->jenis_kategori = $request->jenis_kategori;
        $iaPks->tanggal_mulai = $request->tanggal_mulai;
        $iaPks->tanggal_selesai = $request->tanggal_selesai;

        if ($request->hasFile('file_pks')) {
            $file = $request->file('file_pks');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('file/ia_pks', $filename, 'public');
            $iaPks->file_pks = $filename;
        }

        $iaPks->save();

        return redirect()->route('ia-pks.index')->with('success', 'IA PKS updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IaPks $iaPks)
    {
        // Delete the file if it exists
        if ($iaPks->file_pks) {
            Storage::disk('public')->delete('file/ia_pks/' . $iaPks->file_pks);
        }

        $iaPks->delete();

        return redirect()->route('ia-pks.index')->with('success', 'IA PKS deleted successfully.');
    }
}
