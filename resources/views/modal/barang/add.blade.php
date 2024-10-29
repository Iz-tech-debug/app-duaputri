<!-- Modal -->
<div class="modal fade" id="tambahbarang" tabindex="-1" aria-labelledby="tambahbarang" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/tambah_barang" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode" class="form-label">ID/Kode Barang</label>
                        <input type="number" class="form-control" id="kode" name="kode_barang"
                            placeholder="Contoh : 10878987672">
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama_barang"
                            placeholder="Contoh : Kecap Bangbung Hideung">
                    </div>

                    <div class="mb-3">
                        <label for="hr_awal" class="form-label">Harga Awal</label>
                        <input type="text" class="form-control" id="hr_awal" name="hr_awal"
                            placeholder="Contoh : 12000">
                    </div>

                    <div class="mb-3">
                        <label for="hr_jual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="hr_jual" name="hr_jual"
                            placeholder="Contoh : 12500">
                    </div>

                    <div class="mb-3">
                        <label for="exp" class="form-label">Tanggal Expire</label>
                        <input type="date" class="form-control" id="exp" name="tgl_exp">
                    </div>

                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select name="satuan" class="form-select" id="satuan">
                            <option value="Lusin">Lusin</option>
                            <option value="Kodi">Kodi</option>
                            <option value="Karung">Karung</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Kg">Kg</option>
                            <option value="Liter">Liter</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" id="kategori">
                            <option value="Hasil Bumi">Hasil Bumi</option>
                            <option value="Bahan Pangan">Bahan Pangan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="no_order" class="form-label">Nomor Order</label>
                        <input type="text" class="form-control" id="no_order" name="no_order"
                            placeholder="Contoh : KD08761">
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah"
                            value="0" readonly>
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
