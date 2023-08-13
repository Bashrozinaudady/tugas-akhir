@extends('layouts.index')

@section('content')
    <div class="pagetitle">
        <h1>INPUT PESANAN</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pemesanan.index') }}">Transaksi</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pemesanan.index') }}">Pemesanan</a></li>
                <li class="breadcrumb-item active">Data Baru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form class="was-required" action="{{ route('pemesanan.store') }}" method="post">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            @csrf
                            {{-- jangan lupa untuk menambah route store dan @csrf --}}
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Pemesan</label>
                                        <div class="col-sm-8">
                                            <select name="sales_id" id="sales_id" class="form-control">
                                                <option value="">--Pilih Sales / Mitra--</option>
                                                @foreach ($sales as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-4 col-form-label">Kode Sales</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="kode_sales" placeholder="tidak usah di isi"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                {{-- daftar pesanan --}}
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th>Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="detil">
                                            <tr>
                                                <td>
                                                    <select name="produk_id[]" id="produk_id" class="form-control">
                                                        <option value="">--Pilih Produk--</option>
                                                        @foreach ($produk as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" id="kategori" placeholder="tidak usah di isi"
                                                        class="form-control" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" id="harga" placeholder="tidak usah di isi"
                                                        class="form-control" readonly>
                                                </td>
                                                <td>
                                                    <input type="number" id="jumlah" name="jumlah[]"
                                                        placeholder="angka jumlah" class="form-control" required>
                                                </td>
                                                <td>
                                                    <input type="text" name="total[]" id="total"
                                                        placeholder="tidak usah di isi" class="form-control" readonly>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0)" id="add"
                                                        class="btn btn-outline-primary"><i class="bi bi-plus"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="table-secondary table-borderred">
                                                <th>SUB TOTAL</th>
                                                <th colspan="5"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                {{-- catatan pemesanan --}}
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Catatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="keterangan" id="keterangan"
                                                placeholder="Tulis catan pesanan" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-end"><i class="bi bi-save"></i>
                                Simpan</button>
                            <button type="button" onclick="window.history.back()"
                                class="btn btn-secondary float-end me-3"><i class="bi bi-arrow-left-circle"></i>
                                Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('javascript')
    <script>
        $(document).ready(function() {
            $('#sales_id').on('change', function() {
                let id = $(this).val();
                $.ajax({
                    url: '/sales/' + id + '/get',
                    type: 'GET',
                    success: function(e) {
                        $('#kode_sales').val(e.nomor_anggota);
                    }
                })
            })

            $('#produk_id').on('change', function() {
                let id = $(this).val();
                $.ajax({
                    url: '/produk/' + id + '/get',
                    type: 'GET',
                    success: function(e) {
                        console.log(e);
                        $('#harga').val(e.harga);
                        $('#kategori').val(e.kategori_produk.nama);
                    }
                })
            })

            $('#jumlah').on('input', function() {
                let jml = $(this).val();
                let hrg = $('#harga').val();
                $('#total').val(jml * hrg);
            })

        })
        $(document).ready(function() {
            let maxField = 10;
            let addButton = ('#add');
            let kotak = ('#detil');

            $(addButton).click(function() {
                let x = 1; // jumlah baris input pertama
                if (x < maxField) {
                    x++; // perulangan untuk jumlah baris input
                    let HTML = '<tr>' +
                        '<td>' +
                        '<select name="produk_id[]" id="produk_' + x + '" class="form-control">' +
                        '<option value="">--Pilih Produk--</option>' +
                        '@foreach ($produk as $item)' +
                        '<option value="{{ $item->id }}">{{ $item->nama }}</option>' +
                        '@endforeach' +
                        '</select>' +
                        '</td>' +
                        '<td>' +
                        '<input type="text" id="kategori-' + x +
                        '" placeholder="tidak usah di isi" class="form-control" readonly>' +
                        '</td>' +
                        '<td>' +
                        '<input type="text" id="harga-' + x +
                        '" placeholder="tidak usah di isi" class="form-control" readonly>' +
                        '</td>' +
                        '<td>' +
                        '<input type="number" id="jumlah-' + x +
                        '" name="jumlah[]" placeholder="angka jumlah" class="form-control" required>' +
                        '</td>' +
                        '<td>' +
                        '<input type="text" id="total-' + x +
                        '" placeholder="tidak usah di isi" class="form-control" readonly>' +
                        '</td>' +
                        '<td class="text-center">' +
                        '<a href="javascript:void(0)" id="hapus" class="btn btn-outline-warning"><i class="bi bi-trash"></i></a>' +
                        '</td>' +
                        '</tr>';
                    $(kotak).append(HTML); // tambah input baru
                }
            });

            $(kotak).on('click', '#hapus', function(e) {
                e.preventDefault();
                $(this).parent('td').parent('tr').remove();
                x--;
            });
        })
    </script>
@endpush
