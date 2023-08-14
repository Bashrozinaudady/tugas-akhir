<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\TransaksiOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jual = DB::table('transaksi_order_detils')->select(DB::raw('SUM(nominal) AS total'))->first();
        $masuk = DB::table('transaksi_masuks')->select(DB::raw('SUM(nominal) AS total'))->first();
        $mitra = DB::table('mitras')->select(DB::raw('SUM(id) AS total'))->first();
        // dd($pendapatan);
        return view('dashboard.index', compact(['jual', 'masuk', 'mitra']));
    }
}
