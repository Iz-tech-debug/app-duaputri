@extends('layout.mainLayout')

@section('title', 'Admin - Barang')

@section('content')

    <div class="pagetitle">
        <h1>Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Beranda</a></li>
                <li class="breadcrumb-item active">Barang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @include('modal.barang.add')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3 pt-3">
                            <div>
                                <h5 class="card-title">Tabel Barang</h5>
                                <p>*Tambah, edit, hapus, dan lihat detail barang dengan mengklik ikon mata.</p>
                            </div>
                            <button class="btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#tambahbarang">Tambah Barang</button>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Jual</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $list)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list->nama_barang }}</td>
                                        <td>{{ 'Rp ' . number_format($list->hr_jual, 0, ',', '.') }}</td>
                                        <td style="{{ $list->jumlah < 10 ? 'color:red;' : '' }}">{{ $list->jumlah }}</td>
                                        <td>
                                            <button class="btn btn-primary mt-2" data-bs-toggle="modal"
                                                data-bs-target="#editbarang{{ $list->id_barang }}">Edit</button>
                                            @include('modal.barang.edit')
                                            <button class="btn btn-success mt-2" data-bs-toggle="modal"
                                                data-bs-target="#lihatbarang{{ $list->id_barang }}"><i
                                                    class="bi bi-eye"></i></button>
                                            @include('modal.barang.detail')
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
