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
            <h5 class="card-title">Detil Produk</h5>
            <table class="table striped">
                <tr>
                    <td>Nama Produk</td>
                    <td>{{ $data->nama}}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>{{ $data->harga}}</td>
                </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection