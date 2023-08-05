<?php

namespace Database\Seeders;

use App\Models\TransaksiOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiOrder::create([
            'kode' => 'PO001',
            'sales_id' => 1,
            'produk_id' => 1,
            'jumlah' => 5,
        ]);
    }
}
