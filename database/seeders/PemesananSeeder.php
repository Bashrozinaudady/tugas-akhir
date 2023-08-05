<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemesanan::create([
            'nama_pemesan' => 'neha',
            'nama_produk' => 'Air Gelas 200 ml',
            'nama_kategori' => 'Air gelas'
        ]);
    }
}
