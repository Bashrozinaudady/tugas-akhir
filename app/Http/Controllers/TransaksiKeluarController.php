<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Helpers\Docnumber;
use App\Models\Jurnal;
use Illuminate\Http\Request;
use App\Models\TransaksiKeluar;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = TransaksiKeluar::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($dt) {
                    $edit = '<a href="keluar/'.$dt->id.'/edit" class="btn btn-sm btn-warning me-2">Edit</a>';
                    // $detil = '<a href="keluar/'.$dt->id.'" class="btn btn-sm btn-info">Detil</a>';
                    return $edit;
                })
                ->addColumn('nominal', function($data){
                    return number_format($data->nominal, 2, ',', '.');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pengeluaran.index');
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

        $jurnal = Jurnal::create([
            'kode_transaksi' => $simpan->kode,
            'keterangan' => $simpan->keterangan,
            'nominal' => $simpan->nominal,
        ]);

        if ($simpan && $jurnal) {
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
    public function edit($id)
    {
        $data = TransaksiKeluar::where('id', $id)->first();

        return view('pengeluaran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = TransaksiKeluar::where('id', $id)->first();
        $data->mitra = $request->mitra;
        $data->keterangan = $request->keterangan;
        $data->nominal = $request->nominal;

        $data->update();

        return redirect()->route('keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiKeluar $transaksiKeluar)
    {
        //
    }
}
