@extends('layouts.index')
@section('content')
    <div class="pagetitle">
        <h1>DATA PEMESANAN</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Transaksi</li>
                <li class="breadcrumb-item active">Pemesanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pemesanan</h5>
                        <a href="" class="btn btn-primary btn-sm">Tambah</a>
                        <!-- Default Table -->
                        {{ $dataTable->table() }}
                        {{-- <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->sales->nama }}</td>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td>{{ $item->produk->kategori_produk->nama }}</td>
                                        <td>{{ number_format($item->produk->harga, 2, ',', '.') }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('pemesanan.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="" class="btn btn-sm btn-primary">Lihat</a>
                                                <a href="{{ route('pemesanan.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('javascript')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
