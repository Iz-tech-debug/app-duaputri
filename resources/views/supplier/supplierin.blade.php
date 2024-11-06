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
                        </div>

                        <form action="/b_masuk" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_trans" class="form-label">Nota Transaksi</label>
                                <input type="text" class="form-control" id="id_trans" name="id_trans" readonly>
                            </div>

                            <!-- Dropdown Nama Supplier -->
                            <div class="mb-3">
                                <label for="supplier_id" class="form-label">Nama Pemasok</label>
                                <select class="form-control" id="supplier_id" name="supplier_id">
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->nama_suplier }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Container untuk input barang -->
                            <div id="barang-container">
                                <div class="barang-input mb-3">

                                    <label for="barang_id" class="form-label">Nama Barang</label>
                                    <select class="form-control" name="barang_id[]">
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barang as $list)
                                            <option value="{{ $list->id_barang }}">{{ $list->nama_barang }}</option>
                                        @endforeach
                                    </select>

                                    <label for="harga_satuan" class="form-label">Harga Satuan</label>
                                    <input type="number" min="0" class="form-control" name="harga_satuan[]" required>

                                    <label for="jumlah" class="form-label">Kuantitas</label>
                                    <input type="number" min="0" class="form-control" name="jumlah[]" required>

                                    <label for="total_harga" class="form-label">Total Harga</label>
                                    <input type="number" min="0" class="form-control" name="total_harga[]" readonly>
                                    <!-- Readonly agar hanya menampilkan hasil perhitungan -->

                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tanggal_masuk[]" required>
                                </div>
                                <hr>
                            </div>

                            <button type="button" class="btn btn-danger " id="remove-barang">Batalkan</button>

                            <button type="button" class="btn btn-success" id="add-barang">Tambah Barang Lagi</button>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

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
                                        <td>{{ $item->id }}</td>
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

    <script>
        document.getElementById('barang-container').addEventListener('input', function(e) {
            if (e.target && e.target.name === 'jumlah[]' || e.target.name === 'harga_satuan[]') {
                const barangInputs = document.querySelectorAll('.barang-input');
                barangInputs.forEach(input => {
                    const hargaSatuan = parseFloat(input.querySelector('input[name="harga_satuan[]"]')
                        .value) || 0;
                    const jumlah = parseFloat(input.querySelector('input[name="jumlah[]"]').value) || 0;
                    const totalHarga = hargaSatuan * jumlah;
                    input.querySelector('input[name="total_harga[]"]').value = totalHarga.toFixed(2);
                });
            }
        });

        document.getElementById('add-barang').addEventListener('click', function() {
            // Ambil container untuk barang
            let barangContainer = document.getElementById('barang-container');

            // Duplikasi bagian barang dan tambahkan ke container
            let newBarang = document.querySelector('.barang-input').cloneNode(true);
            newBarang.querySelector('select').value = ''; // Reset dropdown
            newBarang.querySelectorAll('input').forEach(input => input.value = ''); // Reset semua input
            barangContainer.appendChild(newBarang);
        });
    </script>
@endsection
