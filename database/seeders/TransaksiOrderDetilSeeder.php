<?php

namespace Database\Seeders;

use App\Models\TransaksiOrderDetil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiOrderDetilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiOrderDetil::create([
            'transaksi_order_id' => 1,
            'produk_id' => 1,
            'jumlah' => 5,
        ]);
    }
}
