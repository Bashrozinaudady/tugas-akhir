@extends('layouts.index')
@section('content')
<div class="pagetitle">
    <h1>DATA KATEGORI</h1>
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
            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">Tambah</a>

            <!-- Default Table -->
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Kategori</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                  <td scope="row">{{ $loop->iteration }}</td>
                  <td>{{$item->nama}}</td>
                  <td>
                    <form method="POST" action="{{route('kategori.destroy', $item->id)}}">
                      @csrf
                      @method('DELETE')
                      <a href="" class="btn btn-sm btn-primary">Lihat</a>
                      <a href="{{route('kategori.edit', $item->id)}}" class="btn btn-sm btn-warning">Edit</a>
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