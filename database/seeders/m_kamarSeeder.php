<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class m_kamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamar')->insert([
            [
                'nama' => 'kamar 1',
                'deskripsi' => 'kamar bagus',
                'luas' => '3 x 5 M',
                'fasilitas' => 'AC',
                'harga' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'kamar 2',
                'deskripsi' => 'kamar bagus',
                'luas' => '3 x 5 M',
                'fasilitas' => 'AC',
                'harga' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'kamar 3',
                'deskripsi' => 'kamar bagus',
                'luas' => '3 x 5 M',
                'fasilitas' => 'AC',
                'harga' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
