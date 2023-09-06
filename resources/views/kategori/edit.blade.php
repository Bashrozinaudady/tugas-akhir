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
              <h5 class="card-title">Edit Kategori</h5>

              <!-- Horizontal Form -->
              <form method="POST" action="{{route('kategori.update', $data->id)}}">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                  <label for="inputNamaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input value="{{$data->nama}}" name="nama" type="text" class="form-control" id="inputNamaKategori">
                  </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

         

        </div>
      </div>
    </section>

  
@endsection