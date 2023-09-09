@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>DATA HAK AKSES</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Hak Akses</li>
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
                        <a href="{{ route('jabatan.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('user.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <a href="{{ route('user.destroy', $item->id) }}"
                                                class="btn btn-sm btn-danger">Hapus</a>
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
