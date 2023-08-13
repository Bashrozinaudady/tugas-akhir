@extends('layouts.index')

@section('content')
<div class="pagetitle">
    <h1>DATA PRODUK</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item">Produk</li>
        <li class="breadcrumb-item active">Semua</li>
      </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Default Table</h5>
            <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm">Tambah</a>
            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->kategori_produk->nama}}</td>
                  <td>{{ $item->keterangan }}</td>
                  <td>{{number_format($item->harga,2,',','.')}}</td>
                  <td>
                    <a href="{{ route('produk.show', $item->id)}}" class="btn btn-sm btn-primary">Lihat</a>
                    <a href="{{ route('produk.edit', $item->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ route('produk.destroy', $item->id)}}" class="btn btn-sm btn-danger">Hapus</a>
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