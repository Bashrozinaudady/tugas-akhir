@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>EDIT PEMESANAN</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pemesanan.index') }}">Transaksi</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pemesanan.index') }}">Pemesanan</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form class="was-required" action="{{ route('pemesanan.store') }}" method="post">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            @csrf
                            {{-- jangan lupa untuk menambah route store dan @csrf --}}
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Pemesan</label>
                                        <div class="col-sm-8">
                                            <select name="sales_id" id="" class="form-control">
                                                <option value="">--Pilih Sales / Mitra--</option>
                                                @foreach ($sales as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id === $data->sales_id ? 'selected' : '' }}>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Produk</label>
                                        <div class="col-sm-8">
                                            <select name="produk_id" id="" class="form-control">
                                                <option value="">--Pilih Produk--</option>
                                                @foreach ($produk as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id === $data->produk_id ? 'selected' : '' }}>
                                                        {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="{{ $data->produk->kategori_produk->nama }}"
                                                placeholder="tidak usah di isi" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Kode Sales</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="{{ $data->sales->nomor_anggota }}"
                                                placeholder="tidak usah di isi" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="{{ number_format($data->produk->harga, 2, ',', '.') }}"
                                                placeholder="tidak usah di isi" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Jumlah</label>
                                        <div class="col-sm-8">
                                            <input type="number" value="{{ $data->jumlah }}" name="jumlah"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Total</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="{{ number_format($data->jumlah * $data->produk->harga, 2, ',', '.') }}"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-save"></i>
                                Ubah</button>
                            <button type="button" onclick="window.history.back()"
                                class="btn btn-secondary float-end me-3"><i class="bi bi-arrow-left-circle"></i>
                                Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
