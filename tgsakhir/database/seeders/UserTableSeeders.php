<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'gunawan',
            'email' => 'ggn@gmail.com',
            'password' => Hash::make('12345')
        ]);

        // Tambahkan data registrasi lainnya
        DB::table('users')->insert([
            'name' => 'Andika',
            'email' => 'andika@example.com',
            'password' => Hash::make('password123')
        ]);

        DB::table('users')->insert([
            'name' => 'Sari',
            'email' => 'sari@example.com',
            'password' => Hash::make('sari123')
        ]);
    }
}
