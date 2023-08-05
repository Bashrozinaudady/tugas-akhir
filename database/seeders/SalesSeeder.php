<?php

namespace Database\Seeders;

use App\Models\Sales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sales::create([
            'nomor_anggota' => 'A001',
            'nama' => 'ahmad',
            'alamat' => 'campaka',
            'no_hp' => '1234567890',
        ]);
    }
}
