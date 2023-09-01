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
                <form class="was-required" action="{{ route('pemesanan.update', $data->id) }}" method="post">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            {{-- jangan lupa untuk menambah route store dan @csrf --}}
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Pemesan</label>
                                        <div class="col-sm-8">
                                            <select name="sales_id" id="sales_id" class="form-control">
                                                <option value="">--Pilih Sales / Mitra--</option>
                                                @foreach ($sales as $item)
                                                    <option value="{{ $item->id }}" {{$item->id == $data->sales_id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Kode Sales</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="{{ $data->sales->nomor_anggota}}" id="kode_sales" placeholder="tidak usah di isi"
                                                class="form-control" readonly>
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
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="detil">
                                            @foreach ($data->transaksi_order_detils as $items)
                                            <tr>
                                                <td>
                                                    <select name="produk_id[]" id="produk_1" data-id="1" class="form-control produk">
                                                        <option value="">--Pilih Produk--</option>
                                                        @foreach ($produk as $item)
                                                            <option value="{{ $item->id }}" {{$item->id == $items->produk_id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" value="{{$items->produk->kategori_produk->nama}}" id="kategori" placeholder="tidak usah di isi"
                                                        class="form-control" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" value="{{$items->produk->harga}}" id="harga" placeholder="tidak usah di isi"
                                                        class="form-control" readonly>
                                                </td>
                                                <td>
                                                    <input type="number" value="{{$items->jumlah}}" id="jumlah" name="jumlah[]"
                                                        placeholder="angka jumlah" class="form-control" required>
                                                </td>
                                                <td>
                                                    <input type="text" value="{{$items->nominal}}" name="total[]" id="total"
                                                        placeholder="tidak usah di isi" class="form-control" readonly>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" id="add"
                                                        class="btn btn-outline-primary"><i class="bi bi-plus"></i></a>
                                                </td>
                                            </tr>                                                
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="table-secondary table-borderred">
                                                <th>SUB TOTAL</th>
                                                <th colspan="5"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                {{-- catatan pemesanan --}}
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Catatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="keterangan" id="keterangan"
                                                placeholder="Tulis catan pesanan" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-save"></i>
                                Simpan</button>
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
