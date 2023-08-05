<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::all();
        return view('produk.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = KategoriProduk::all();
        return view('produk.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $simpan = Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama' => $request->nama,
            'keterangan' =>$request->keterangan,
            'harga' => $request->harga,
        ]);

        if ($simpan){
            return redirect()->route('produk.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Produk::findOrFail($id);
        if ($data) {
            return view('produk.show', compact('data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Produk::findOrFail($id);
        $kategori = KategoriProduk::all();
        return view('produk.edit', compact(['data', 'kategori']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->kategori_id = $request->kategori_id;
        $produk->nama = $request->nama;
        $produk->keterangan = $request->keterangan;
        $produk->harga = $request->harga;
        
        if ($produk->update())
        {
            return redirect()->route('produk.index');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
