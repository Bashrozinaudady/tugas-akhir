@extends('layouts.index')

@section('content')
<div class="pagetitle">
    <h1>EDIT PENGELUARAN</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('keluar.index') }}">Transaksi</a></li>
            <li class="breadcrumb-item"><a href="{{ route('keluar.index') }}">Pemesanan</a></li>
            <li class="breadcrumb-item active">Data Baru</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <form class="was-required" action="{{ route('keluar.update', $data->id) }}" method="post">
               @csrf
               @method('PUT')
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Tujuan</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $data->mitra }}" name="mitra" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $data->keterangan }}" name="keterangan" class="form-control" required>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Nominal</label>
                                    <div class="col-sm-8">
                                        <input type="number" value="{{$data->nominal}}" name="nominal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-8">
                                        <input type="date" value="{{$data->tanggal_transaksi}}" name="tanggal_transaksi" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection