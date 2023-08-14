@extends('layouts.index')
@section('content')
    <div class="pagetitle">
        <h1>Tambah Karyawan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Karyawan</li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <!-- Horizontal Form -->
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="card-body">
                            <h5 class="card-title">Tambah Karyawan</h5>

                            <div class="row mb-3">
                                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" placeholder="tulis nama"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputKategori" class="col-sm-2 col-form-label">Hak Akses</label>
                                <div class="col-sm-10">
                                    <select name="role" id="" class="form-control" required>
                                        <option value="">--Pilih--</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputKeterangan" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" placeholder="tulis email"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputHarga" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" placeholder="tulis password"
                                        required>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer p-2">
                            <button type="submit" class="btn btn-primary float-end m-3">Simpan</button>

                        </div>
                    </form><!-- End Horizontal Form -->
                </div>
            </div>
        </div>
    </section>
@endsection
