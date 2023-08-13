@extends('layouts.index')
@section('content')
    <div class="pagetitle">
        <h1>DATA PEMASUKAN</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Transaksi</li>
                <li class="breadcrumb-item active">Pemasukan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Pemasukan</h5>
                        <a href="{{ route('masuk.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Nominal Transaksi</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->nominal }}</td>
                                        <td>{{ $item->tanggal_transaksi }}</td>
                                        <td>
                                            {{-- <a href="http://" class="btn btn-sm btn-primary">Lihat</a>
                    <a href="http://" class="btn btn-sm btn-warning">Edit</a> --}}
                                            <form method="POST" action="{{ route('masuk.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="" class="btn btn-sm btn-primary">Lihat</a>
                                                <a href="{{ route('masuk.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
