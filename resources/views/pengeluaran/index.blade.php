@extends('layouts.index')
@section('content')
<div class="pagetitle">
    <h1>DATA PENGELUARAN</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item">Kategori</li>
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

            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Pemesan</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Nama Kategori</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <td>{{$item->nama_pemesan}}</td>
                  <td>{{$item->nama_produk}}</td>
                  <td>{{$item->nama_kategori}}</td>
                  <td>
                    <a href="http://" class="btn btn-sm btn-primary">Lihat</a>
                    <a href="http://" class="btn btn-sm btn-warning">Edit</a>
                    <a href="http://" class="btn btn-sm btn-danger">Hapus</a>
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