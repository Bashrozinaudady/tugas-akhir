@extends('layouts.index')
@section('content')
    <div class="pagetitle">
        <h1>Jabatan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Jabatan</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Jabatan</h5>

                        <!-- Horizontal Form -->
                        <form method="POST" action="{{ route('jabatan.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama Jabatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="inputNama">
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary float-end">Simpan</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
