@extends('layouts.index')
@section('content')
    <div class="pagetitle">
        <h1>JURNAL TRANSAKSI</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item active">Jurnal</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">

                        <h5 class="">Data Pemesanan</h5>
                    </div>
                    <div class="card-body">
                        {{-- <a href="" class="btn btn-primary btn-sm">Tambah</a> --}}
                        <!-- Default Table -->
                        {{-- {{ $dataTable->table() }} --}}
                        <table class="table data-table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">KODE. Transaksi</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">DEBET</th>
                                    <th scope="col">KREDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('javascript')
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
    <script>
        $(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "bDestroy": true,
                ajax: "{{ route('jurnal.index') }}",
                // dom: 'Bfrtip',
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', {
                        text: 'TRANSAKSI BARU',
                        action: function(e, dt, node, config) {
                            window.location.href = "{{ route('pemesanan.create') }}"
                        },
                        className: 'btn btn-primary'
                    }
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        'orderable': false,
                        'searchable': false,
                        class: 'text-center'
                    },
                    {
                        data: 'kode_transaksi',
                        name: 'kode_transaksi',
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                    },
                    {
                        data: 'nominal',
                        name: 'nominal',
                    },

                    {
                        data: 'nominal',
                        name: 'nominal',
                    },
                ]
            })
        })
    </script>
@endpush
