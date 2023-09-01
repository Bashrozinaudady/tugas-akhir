@extends('layouts.index')
@section('content')
    <div class="pagetitle">
        <h1>Form SALES</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Sales</li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Sales</h5>

                        <!-- Horizontal Form -->
                        <form method="POST" action="{{ route('sales.update', $data->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nomor Anggota</label>
                                <div class="col-sm-10">
                                    <input type="text"@readonly(true) value="{{ $data->nomor_anggota }}"  class="form-control"
                                        id="inputNama">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $data->nama }}" name="nama" class="form-control"
                                        id="inputNama">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputKeterangan" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $data->alamat }}" name="alamat" class="form-control"
                                        id="inputPassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputHarga" class="col-sm-2 col-form-label">Kontak</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{ $data->no_hp }}" name="no_hp" class="form-control"
                                        id="inputHarga" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
