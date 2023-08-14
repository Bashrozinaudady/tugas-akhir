<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sales::all();
        return view('sales.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sales.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Sales::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
        ]);

        if ($data)
        {
            return redirect()->route('sales.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Sales::where('id', $id)->first();

        return view('sales.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Sales::where('id', $id)->first();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->kontak = $request->kontak;
        $data->update();

        return redirect()->route('mitra.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $mitra)
    {
        //
    }
}
