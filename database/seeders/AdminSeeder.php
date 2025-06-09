<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            [
                'nama' => 'Admin Utama',
                'email' => 'admin@example.com',
                'no_hp' => '081111111111',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Admin Kedua',
                'email' => 'admin2@example.com',
                'no_hp' => '082222222222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
