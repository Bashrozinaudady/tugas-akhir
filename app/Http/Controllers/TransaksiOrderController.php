<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sales;
use App\Models\Produk;
use App\Helpers\Docnumber;
use Illuminate\Http\Request;
use App\Models\TransaksiOrder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\TransaksiOrdersDataTable;
use App\Models\TransaksiOrderDetil;

class TransaksiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = TransaksiOrder::with('sales')->with('produk')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($dt) {
                    $edit = '<a href="pemesanan/'.$dt->id.'/edit" class="btn btn-sm btn-warning me-2">Edit</a>';
                    $detil = '<a href="pemesanan/'.$dt->id.'" class="btn btn-sm btn-info">Detil</a>';
                    return $edit . $detil;
                })
                ->addColumn('nama_pemesan', function ($data) {
                    return $data->sales->nama;
                })
                // ->addColumn('harga', function($data) {
                //     return number_format($data->produk->harga, 2, ',', '.');
                // })
                // ->addColumn('total', function($data){
                //     return number_format($data->jumlah * $data->produk->harga, 2, ',', '.');
                // })
                ->rawColumns(['nama_pemesan', 'action'])
                ->make(true);

        }
        return view('pemesanan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        $sales = Sales::all();
        return view('pemesanan.create', compact(['sales', 'produk']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek data dari transaksi untuk memeriksa nomor transaksi
        $lastData = DB::table('transaksi_orders')->latest()->first();
        if ($lastData->kode)
        {
            $kode = Docnumber::createDocnum('PO', $lastData->kode);
        } else {
            $kode = 'PO001' . date('mY', strtotime(Carbon::now()));
        }
        // buat transaksi baru
        $new = TransaksiOrder::create([
            'kode' => $kode,
            'sales_id' => $request->sales_id,
            'keterangan' => $request->keterangan,
        ]);

        if ($new) {
            // cek detil transaksi, jika ada simpan
            if (count($request->produk_id) > 0)
            {
                foreach ($request->produk_id as $key => $value) {
                    TransaksiOrderDetil::create([
                        'transaksi_order_id' => $new->id,
                        'produk_id' => $value,
                        'jumlah' => $request->jumlah[$key],
                    ]);
                }
            }
            return redirect()->route('pemesanan.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = TransaksiOrder::with('transaksi_order_detils')->where('id', $id)->first();
        return view('pemesanan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = TransaksiOrder::with('sales')->with('produk')->where('id', $id)->first();
        $produk = Produk::all();
        $sales = Sales::all();
        return view('pemesanan.edit', compact(['data', 'produk', 'sales']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiOrder $transaksiOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiOrder $transaksiOrder)
    {
        //
    }

    public function createNumber($lastNumber)
    {
        //ambil 3 karakter setelah karakter pertama
        $oldnum = substr($lastNumber, 1, 3);

        $newNum = $oldnum + 1;
        $docnum = 'P' . sprintf("%03d", $newNum);

        // ambil tanggal sekarang
        $monthYear = date('mY', strtotime(Carbon::now()));
        $newDocNum = $docnum . $monthYear;
        return $newDocNum;
    }
}
