@extends('layout.mainLayout')

@section('title', 'Detail Transaksi')

@section('content')

    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3 pt-3">
                            <div>
                                <h5 class="card-title">Data Transaksi</h5>
                                <p>*Lihat detail transaksi</p>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Konsumen</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $list)
                                    <tr>
                                        <td>{{ $list->kode_transaksi }}</td>
                                        <td>{{ $list->nama_konsumen }}</td>
                                        <td>{{ 'Rp ' . number_format($list->total, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge {{ $list->sisa == 0 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $list->sisa == 0 ? 'Lunas' : 'Hutang' }}
                                            </span>
                                        </td>
                                        <td>{{ $list->tanggal_transaksi }}</td>
                                        <td><button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#detailtrans{{ $list->id }}">Detail</button>
                                            @include('modal.transaksi.detail')
                                        </td>
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
