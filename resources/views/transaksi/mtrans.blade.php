@extends('layout.mainLayout')

@section('title', 'Transaksi')

@section('content')

    <div class="pagetitle">
        <h1>Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>

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
                                    <td style="{{ $list->jumlah < 10 ? 'color:red;' : '' }}">{{ $list->jumlah }}</td>
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
                    <form action="/trans" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="row mb-3">
                            <label for="notrans" class="col-sm-4 col-form-label">Nomor Transaksi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="notrans" name="notrans"
                                    value="{{ $kodeOtomatis }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="konsumen" class="col-sm-4 col-form-label">Nama Konsumen</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="konsumen" name="konsumen" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-sm-4 col-form-label">Total</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="total" name="total"
                                        value="{{ $total }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bayar" class="col-sm-4 col-form-label">Bayar</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control" id="bayar" name="bayar">
                                </div>
                            </div>
                            <div id="error-message" class="text-danger mt-2" style="display:none;"></div>
                        </div>

                        <div class="row mb-3">
                            <label for="kembalian" class="col-sm-4 col-form-label">Kembalian</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="sisa" class="col-sm-4 col-form-label">Sisa</label>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="sisa" name="sisa" readonly>
                                </div>
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
                    <p>*klik di baris keranjang untuk menghapus</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("bayar").addEventListener("keyup", function() {
            value = this.value;
            // console.log(value);

            if (value < 0) {
                this.value = 0;
            }
        });

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

        // Fungsi untuk memformat angka ke dalam format Rupiah
        function formatRupiah(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Event listener untuk input pada kolom "bayar"
        document.getElementById("bayar").addEventListener("input", function() {
            // Ambil nilai bayar, dan bersihkan titik atau koma
            const bayar = parseInt(this.value.replace(/[.,]/g, "")) || 0;
            // Ambil nilai total, dan bersihkan titik atau koma
            const total = parseInt(document.getElementById("total").value.replace(/[.,]/g, "")) || 0;

            // Hitung nilai kembalian dan sisa
            const kembalian = bayar >= total ? bayar - total : 0;
            const sisa = bayar < total ? total - bayar : 0;

            // Tampilkan kembalian dan sisa dalam format rupiah, tetapi simpan sebagai integer
            document.getElementById("kembalian").value = formatRupiah(kembalian);
            document.getElementById("sisa").value = formatRupiah(sisa);
        });

        // Fungsi untuk menghapus format titik dan koma sebelum submit form
        document.querySelector("form").addEventListener("submit", function() {
            // Bersihkan titik dan koma dari input sebelum dikirim ke database
            document.getElementById("bayar").value = document.getElementById("bayar").value.replace(/[.,]/g, "");
            document.getElementById("kembalian").value = document.getElementById("kembalian").value.replace(/[.,]/g,
                "");
            document.getElementById("sisa").value = document.getElementById("sisa").value.replace(/[.,]/g, "");
        });
    </script>
@endsection
