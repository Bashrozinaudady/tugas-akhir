<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Docnumber;
use Illuminate\Http\Request;
use App\Models\TransaksiKeluar;
use Illuminate\Support\Facades\DB;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TransaksiKeluar::all();

        return view('pengeluaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $dataTerakhir = DB::table('transaksi_keluars')->latest()->first();
        if ($dataTerakhir)
        {
            $kode = Docnumber::createDocnum('TK', $dataTerakhir->kode);
        } else {
            $kode = 'TK001' . date('mY', strtotime(Carbon::now()));
        }
        $simpan = TransaksiKeluar::create([
            'kode' => $kode,
            'mitra' => $request->mitra,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);
        if ($simpan) {
            return redirect()->route('keluar.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiKeluar $transaksiKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiKeluar $transaksiKeluar)
    {
        //
    }
}
