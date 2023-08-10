<?php

namespace Database\Seeders;

use App\Models\TransaksiOrder;
use Carbon\Carbon;
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
            'kode' => 'PO001' . Carbon::now()->format('mY'),
            'sales_id' => 1,
            'keterangan' => 'tes keterangan',
        ]);
    }
}
