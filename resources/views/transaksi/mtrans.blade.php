@extends('layout.mainLayout')

@section('title', 'Admin - Transaksi')

@section('content')

    <div class="pagetitle">
        <h1>Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>
            <h6 hidden>{{ Auth::user()->id }}</h6>
        </nav>
    </div><!-- End Page Title -->

    <div class="row">
        <!-- Card Pertama -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3 pt-3">
                        <div>
                            <h5 class="card-title">Tabel Barang</h5>
                        </div>
                    </div>

                    <!-- Tabel Barang -->
                    <table class="table datatable table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $list)
                                <tr class="barang-row">
                                    <td>{{ $list->id_barang }}</td>
                                    <td>{{ $list->nama_barang }}</td>
                                    <td>{{ $list->hr_jual }}</td>
                                    <td>{{ $list->jumlah }}</td>
                                    <td><button class="btn btn-primary mt-2" data-bs-toggle="modal"
                                            data-bs-target="#tambahkeranjang{{ $list->id_barang }}">Tambah</button></td>
                                </tr>
                                @include('modal.transaksi.add')
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!-- Card Transaksi -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Keranjang</h5>
                    <form action="/tambah_transaksi" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="notrans" class="col-sm-4 col-form-label">Nomor Transaksi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="notrans" name="notrans" value="KD0001"
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="konsumen" class="col-sm-4 col-form-label">Nama Konsumen</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="konsumen" name="konsumen">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-sm-4 col-form-label">Total</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="total" name="total"
                                    value="{{ $total }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="diskon" class="col-sm-4 col-form-label">Diskon</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="diskon" name="diskon" value="0"
                                    oninput="updateTotal()">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bayar" class="col-sm-4 col-form-label">Bayar</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="bayar" name="bayar" value="0"
                                    oninput="calculateChange()">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kembalian" class="col-sm-4 col-form-label">Kembalian</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="kembalian" name="kembalian" value="0"
                                    readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sisa" class="col-sm-4 col-form-label">Sisa</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="sisa" name="sisa" value="0"
                                    readonly>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button class="btn btn-success" type="submit">Simpan Transaksi</button>
                        </div>
                        <br>

                    </form>

                    <!-- Tabel Keranjang -->

                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($baskets as $keranjang)
                                <tr data-id="{{ $keranjang->id }}" class="keranjang-row">
                                    <td>{{ $keranjang->barang_id }}</td>
                                    <td>{{ $keranjang->hr_jual }}</td>
                                    <td>{{ $keranjang->qty }}</td>
                                    <td>{{ $keranjang->subtotal }}</td>
                                    @include('modal.transaksi.edit', ['keranjang' => $keranjang])
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Misalkan Anda memiliki subtotal di keranjang dalam array
        const subtotals = [ /* ambil dari server atau sumber data */ ];

        function calculateTotal() {
            const total = subtotals.reduce((acc, curr) => acc + curr, 0);
            document.getElementById('total').value = total;
            updateTotal(); // Update total setelah menghitung
        }

        function updateTotal() {
            const total = parseInt(document.getElementById('total').value) || 0;
            const diskon = parseInt(document.getElementById('diskon').value) || 0;
            const finalTotal = total - diskon;
            document.getElementById('total').value = finalTotal;
            calculateChange();
        }

        function calculateChange() {
            const bayar = parseInt(document.getElementById('bayar').value) || 0;
            const total = parseInt(document.getElementById('total').value) || 0;
            const kembalian = bayar - total;
            const sisa = total - bayar < 0 ? 0 : total - bayar;

            document.getElementById('kembalian').value = kembalian < 0 ? 0 : kembalian;
            document.getElementById('sisa').value = sisa;
        }

        // Panggil fungsi untuk menghitung total saat halaman dimuat
        calculateTotal();

        // Edit Keranjang
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.keranjang-row');

            rows.forEach(row => {
                row.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const modalId = `#editkeranjang${id}`;
                    const modal = new bootstrap.Modal(document.querySelector(modalId));
                    modal.show();
                });
            });
        });
    </script>
@endsection
