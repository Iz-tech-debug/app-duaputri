<!-- Modal -->
<div class="modal fade" id="tambahsupplier" tabindex="-1" aria-labelledby="tambahsupplier" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/tambah_supplier" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemasok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_suplier" class="form-label">Nama Pemasok</label>
                        <input type="text" class="form-control" id="nama_suplier" name="nama_suplier"
                            placeholder="Contoh : Fulan">
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Alamat</label>
                        <br>
                        <textarea name="alamat" id="jumlah" cols="53" rows="2"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp"
                            placeholder="Contoh : 08123456789876">
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                            placeholder="Contoh : PT Oke Gas">
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
