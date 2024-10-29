@extends('layout.mainLayout')

@section('title', 'Admin - Barang Masuk')

@section('content')

    <div class="pagetitle">
        <h1>Barang Masuk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Barang Masuk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @include('modal.supplier.barang_masuk.add')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3 pt-3">
                            <div>
                                <h5 class="card-title">Transaksi Barang Masuk</h5>
                                <p>Tambah stok barang menggunakan nota pembelian barang.</p>
                            </div>
                            <button class="btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#barang_masuk">Masukkan Barang</button>
                        </div>

                        <!-- Tabel Transaksi Barang Masuk -->
                        <table class="table datatable table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th class="">Nomor</th>
                                    <th>Kode Transaksi</th>
                                    <th>Pemasok</th>
                                    <th>Tanggal Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($TBMasuk as $item)
                                    <tr class="bmasuk-row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id_tmasuk }}</td>
                                        <td>{{ $item->supplier->nama_suplier }}</td> <!-- Akses nama pemasok dari relasi -->
                                        <td>{{ $item->tgl_bmasuk }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
