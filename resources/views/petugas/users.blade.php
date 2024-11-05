@extends('layout.mainLayout')

@section('title', 'Admin - Pengguna')

@section('content')
    <div class="pagetitle">
        <h1>Petugas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Petugas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @include('modal.petugas.add')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3 pt-3">
                            <div>
                                <h5 class="card-title">Tabel Petugas/Pengguna</h5>
                                <p>Tambah atau edit data pengguna.</p>
                            </div>
                            <button class="btn btn-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#tambahpengguna">Tambah Pengguna</button>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $list)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $list->nama }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>{{ $list->alamat }}</td>
                                        <td>{{ $list->no_telp }}</td>
                                        <td>{{ $list->jenis_kelamin }}</td>
                                        <td>{{ $list->role->nama_role ?? 'Tanpa Role' }}</td>
                                        <td>
                                            @if ($list->role->nama_role !== 'Admin')
                                                <button class="btn btn-primary mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#editpengguna{{ $list->id }}">Edit</button>
                                                <button class="btn btn-danger mt-2" data-bs-toggle="modal"
                                                    data-bs-target="#hapuspengguna{{ $list->id }}">Hapus</button>
                                            @else
                                                <button class="btn btn-primary mt-2" disabled>Edit</button>
                                                <button class="btn btn-danger mt-2" disabled>Hapus</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @include('modal.petugas.edit')
                                    @include('modal.petugas.hapus')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Tabel --}}
            </div>
        </div>
    </section>
@endsection
