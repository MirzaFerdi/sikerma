<?php

namespace App\Http\Controllers;

use App\Models\IaPks;
use App\Models\Mou;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahMou = Mou::count();
        $jumlahPks = IaPks::where('jenis_dokumen', 'PKS')->count();
        $jumlahIa = IaPks::where('jenis_dokumen', 'IA')->count();
        $jumlahKerjaSama = $jumlahPks + $jumlahMou + $jumlahIa;

        // Contoh query untuk grafik kerja sama per tahun
        $grafikKerjaSama = DB::table('kerja_samas')
            ->select(DB::raw('YEAR(tanggal_mulai) as tahun'), DB::raw('count(*) as total'))
            ->groupBy('tahun')
            ->pluck('total', 'tahun');

        return view('dashboard.koordinator', compact('jumlahPks', 'jumlahMou', 'jumlahIa', 'jumlahKerjaSama', 'grafikKerjaSama'));
    }
}
