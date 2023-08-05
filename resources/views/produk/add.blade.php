@extends('layouts.index')
@section('content')

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Produk</h5>

              <!-- Horizontal Form -->
              <form method="POST" action="{{route('produk.store')}}">
                @csrf
                <div class="row mb-3">
                  <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="inputNama">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                  <div class="col-sm-10">
                    <select name="kategori_id" id="" class="form-control">
                    @foreach ($data as $item)
                      <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputKeterangan" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="keterangan" class="form-control" id="inputPassword">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="number" name="harga" class="form-control" id="inputHarga">
                  </div>
                </div>
             
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

         

        </div>
      </div>
    </section>

  
@endsection