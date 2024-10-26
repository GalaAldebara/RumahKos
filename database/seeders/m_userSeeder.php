<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class m_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Administrator',
                'level_id' => 1,
                'password' => Hash::make('password1'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Irza',
                'level_id' => 2,
                'password' => Hash::make('password2'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Yusriyah Firjatullah',
                'level_id' => 3,
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Muhammad Iqbal Makmur Al-Muniri',
                'level_id' => 2,
                'password' => Hash::make('password4'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Arya Bagus Putra Pratama',
                'level_id' => 2,
                'password' => Hash::make('password5'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dido',
                'level_id' => 2,
                'password' => Hash::make('12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
