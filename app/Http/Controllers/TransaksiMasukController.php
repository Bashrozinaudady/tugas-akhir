<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mitra;
use App\Helpers\Docnumber;
use Illuminate\Http\Request;
use App\Models\TransaksiMasuk;
use Illuminate\Support\Facades\DB;

class TransaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TransaksiMasuk::all();

        return view('pemasukan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mitra = Mitra::all(); // ambil semua data mitra
        // panggil tampilan form di sertai data mitra
        return view('pemasukan.create', compact('mitra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ambil data terakhir dari table
        $dataTerakhir = DB::table('transaksi_masuks')->latest()->first();
        // cek kode jika ada data
        if ($dataTerakhir->kode)
        {
            // lanjut membuat kode baru
            $kode = Docnumber::createDocnum('TM', $dataTerakhir->kode);
        } else {
            // buat kode baru
            $kode = 'TM001' . date('mY', strtotime(Carbon::now()));
        }
        // simpan semua data dari inputan / dari form
        $simpan = TransaksiMasuk::create([
            'kode' => $kode,
            'keterangan' => $request->keterangan,
            'mitra_id' => $request->mitra_id,
            'nominal' => $request->nominal,
            'tanggal_transaksi' => $request->tanggal_transaksi,
        ]);
        // cek jika proses simpan berhasil
        if ($simpan) {
            return redirect()->route('masuk.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiMasuk $transaksiMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data=TransaksiMasuk::where("id",$id)->first();
        $mitra=Mitra::all();
        return view("pemasukan.edit", compact(["data","mitra"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        $data=TransaksiMasuk::where("id",$id)->first();
        $data->mitra_id = $request->mitra_id;
        $data->keterangan = $request->keterangan;
        $data->nominal = $request->nominal;
        $data->tanggal_transaksi = $request->tanggal_transaksi;

        $data->update();

        return redirect()->route('masuk.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiMasuk $transaksiMasuk)
    {
        //
    }
}
