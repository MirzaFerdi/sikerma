<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IaPksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ia_pks')->insert([
            [
                'id_mou' => 1,
                'no_dokumen' => 'PKS-001',
                'judul_dokumen' => 'Perjanjian Kerjasama PKS 1',
                'jenis_dokumen' => 'PKS',
                'jenis_kategori' => 'Kategori A',
                'file_pks' => 'pks-001.pdf',
                'tanggal_mulai' => '2025-01-01',
                'tanggal_selesai' => '2026-01-01',
            ],
            [
                'id_mou' => 2,
                'no_dokumen' => 'PKS-002',
                'judul_dokumen' => 'Perjanjian Kerjasama PKS 2',
                'jenis_dokumen' => 'PKS',
                'jenis_kategori' => 'Kategori B',
                'file_pks' => 'pks-002.pdf',
                'tanggal_mulai' => '2025-02-01',
                'tanggal_selesai' => '2026-02-01',
            ],
        ]);
    }
}
