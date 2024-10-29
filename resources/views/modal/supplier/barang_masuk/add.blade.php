<!-- Modal -->
<div class="modal fade" id="barang_masuk" tabindex="-1" aria-labelledby="barang_masuk" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/b_masuk" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemasok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_trans" class="form-label">Nota Transaksi</label>
                        <input type="text" class="form-control" id="id_trans" name="id_trans" required>
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

                    <!-- Dropdown Nama Barang -->
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Nama Barang</label>
                        <select class="form-control" id="barang_id" name="barang_id">
                            <option value="">Pilih Barang</option>
                            @foreach ($barang as $list)
                                <option value="{{ $list->id }}">{{ $list->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Kuantitas</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#supplier_id').select2({
            placeholder: "Pilih Supplier",
            allowClear: true
        });

        $('#barang_id').select2({
            placeholder: "Pilih Barang",
            allowClear: true
        });
    });
</script>
