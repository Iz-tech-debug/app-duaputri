@extends('layout.mainLayout')

@section('title', 'Admin - Supplier')

@section('content')

    <div class="pagetitle">
        <h1>Pemasok</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Pemasok</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @include('modal.supplier.add')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3 pt-3">
                            <div>
                                <h5 class="card-title">Tabel Pemasok</h5>
                                <p>Tambah atau edit data Pemasok.</p>
                            </div>
                            <button class="btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#tambahsupplier">Tambah Pemasok</button>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Pemasok</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $list)
                                    <tr data-id="{{ $list->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list->nama_suplier }}</td>
                                        <td>{{ $list->alamat }}</td>
                                        <td>{{ $list->no_telp }}</td>
                                        <td>{{ $list->nama_perusahaan }}</td>
                                        <td>
                                            <button class="btn btn-primary mt-2" data-bs-toggle="modal"
                                                data-bs-target="#editsupplier{{ $list->id }}">Edit</button>
                                            <button class="btn btn-danger mt-2" data-bs-toggle="modal"
                                                data-bs-target="#hapussupplier{{ $list->id }}">Hapus</button>
                                        </td>
                                        @include('modal.supplier.edit', ['supplier' => $list])
                                        @include('modal.supplier.hapus', ['supplier' => $list])
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
