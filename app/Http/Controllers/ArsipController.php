<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mou;
use App\Models\IaPks;
use App\Models\Dudi;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dudis = Dudi::all();
        $iaPks = IaPks::with('dudi')->get();
        $mouKadaluarsa = Mou::with('dudi')->where('tanggal_selesai', '<', now())->get();
        $iaPksKadaluarsa = IaPks::with('dudi')->where('tanggal_selesai', '<', now())->get();
        $arsip = [
            'mou' => $mouKadaluarsa,
            'ia_pks' => $iaPksKadaluarsa,
        ];
        // dd($arsip);
        return view('arsip', compact('arsip', 'dudis', 'iaPks'));
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
