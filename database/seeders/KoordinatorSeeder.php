<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('koordinator')->insert([
            [
                'id_admin' => 1,
                'nama' => 'Rina Saputri',
                'email' => 'rina.koordinator@example.com',
                'no_hp' => '081234567891',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_admin' => 1,
                'nama' => 'Budi Santoso',
                'email' => 'budi.koordinator@example.com',
                'no_hp' => '081298765432',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
