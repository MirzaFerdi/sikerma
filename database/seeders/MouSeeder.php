<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MouSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mou')->insert([
            [
                'id_dudi' => 1,
                'no_mou' => 'MOU-001',
                'judul_dokumen' => 'Perjanjian Kerjasama',
                'tanggal_mulai' => '2025-01-01',
                'tanggal_selesai' => '2026-01-01',
                'file_mou' => 'mou-001.pdf',
            ],
            [
                'id_dudi' => 2,
                'no_mou' => 'MOU-002',
                'judul_dokumen' => 'Kerjasama Pendidikan',
                'tanggal_mulai' => '2025-02-01',
                'tanggal_selesai' => '2026-02-01',
                'file_mou' => 'mou-002.pdf',
            ],
        ]);
    }
}
