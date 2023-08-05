<?php

namespace App\Http\Controllers;

use App\DataTables\TransaksiOrdersDataTable;
use App\Models\TransaksiOrder;
use Illuminate\Http\Request;

class TransaksiOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TransaksiOrdersDataTable $dataTable)
    {
        // $data = TransaksiOrder::with('sales')->with('produk')->get();
        return $dataTable->render('pemesanan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiOrder $transaksiOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiOrder $transaksiOrder)
    {
        //
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
}
