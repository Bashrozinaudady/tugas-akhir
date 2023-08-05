<?php

namespace Database\Seeders;

use App\Models\Pengeluaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengeluaran::create([
            'nama_produk' => 'neha',
            'nama_kategori' => 'Air Gelas',
            'keterangan' => 'amdk'
        ]);
    }

}