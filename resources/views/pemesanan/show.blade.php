@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>DATA PESANAN</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pemesanan.index') }}">Transaksi</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pemesanan.index') }}">Pemesanan</a></li>
                <li class="breadcrumb-item active">Data Baru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Pemesan</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $data->sales->nama }}" class="form-control"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Kode Sales</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $data->sales->nomor_anggota }}" class="form-control"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- daftar pesanan --}}
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr class="table-secondary">
                                            <th>Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detil">
                                        @foreach ($data->transaksi_order_detils as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->produk->nama }}
                                                </td>
                                                <td>
                                                    {{ $item->produk->kategori_produk->nama }}
                                                </td>
                                                <td>
                                                    {{ number_format($item->produk->harga, 2, ',', '.') }}
                                                </td>
                                                <td>
                                                    {{ $item->jumlah }}
                                                </td>
                                                <td>
                                                    {{ number_format($item->jumlah * $item->produk->harga, 2, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="table-secondary table-borderred">
                                            <th>SUB TOTAL</th>
                                            <th colspan="4"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            {{-- catatan pemesanan --}}
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Catatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $data->keterangan }}" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pemesanan.edit', $data->id) }}" class="btn btn-warning float-end"><i
                                class="bi bi-pencil"></i>
                            Edit</a>
                        <button type="button" onclick="window.history.back()" class="btn btn-secondary float-end me-3"><i
                                class="bi bi-arrow-left-circle"></i>
                            Kembali</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('javascript')
@endpush
