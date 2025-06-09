<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dudi')->insert([
            [
                'id_admin' => 1,
                'id_koordinator' => 1,
                'nama_dudi' => 'PT. Maju Mundur',
                'alamat' => 'Jl. Industri No. 10, Jakarta',
                'email' => 'maju@mail.com',
                'no_telp' => '081234567890',
                'status' => 'request',
                'created_at' => now(),

            ],
            [
                'id_admin' => 1,
                'id_koordinator' => 2,
                'nama_dudi' => 'CV. Sukses Selalu',
                'alamat' => 'Jl. Sukses No. 20, Bandung',
                'email' => 'sukse@mail.com',
                'no_telp' => '082345678901',
                'status' => 'request',
                'created_at' => now(),
            ],
        ]);
    }
}
