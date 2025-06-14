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
                'id_dudi' => 1,
                'no_dokumen' => 'PKS-001',
                'judul_dokumen' => 'Perjanjian Kerjasama PKS 1',
                'jenis_dokumen' => 'PKS',
                'jenis_kategori' => 'Magang',
                'file_pks' => 'pks-001.pdf',
                'tanggal_mulai' => '2025-01-01',
                'tanggal_selesai' => '2025-04-01',
            ],
            [
                'id_dudi' => 2,
                'no_dokumen' => 'PKS-002',
                'judul_dokumen' => 'Perjanjian Kerjasama PKS 2',
                'jenis_dokumen' => 'PKS',
                'jenis_kategori' => 'Industri',
                'file_pks' => 'pks-002.pdf',
                'tanggal_mulai' => '2025-02-01',
                'tanggal_selesai' => '2025-05-01',
            ],
        ]);
    }
}
