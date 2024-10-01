<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class m_levelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_level')->insert([
            [
                'level_kode' => '001',
                'level_nama' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_kode' => '002',
                'level_nama' => 'Owner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'level_kode' => '003',
                'level_nama' => 'Customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
