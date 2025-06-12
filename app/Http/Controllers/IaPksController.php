<?php

namespace App\Http\Controllers;

use App\Models\IaPks;
use Illuminate\Http\Request;

class IaPksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iaPks = IaPks::with('mou')->get();
        $dudis = $iaPks->pluck('mou.dudi')->unique();
        // dd($dudis);
        return view('ia_pks', compact('iaPks', 'dudis'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IaPks $iaPks)
    {
        //
    }
}
