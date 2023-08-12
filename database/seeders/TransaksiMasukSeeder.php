<?php

namespace Database\Seeders;

use App\Models\TransaksiMasuk;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiMasuk::create([
            'kode'=>'TM001',
            'keterangan'=>'modal awal',
            'mitra_id'=>'1',
            'tanggal_transaksi'=>Carbon::now(),
            'nominal'=>'1000000',
        ]);
    }
}
