<!-- Modal -->
<div class="modal fade" id="editbarang{{ $list->id_barang }}" tabindex="-1" aria-labelledby="editbarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/update_barang/{{ $list->id_barang }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="id_barang" class="form-label">ID/Kode Barang</label>
                        <input type="text" class="form-control" id="id_barang" name="id_barang"
                            value="{{ $list->id_barang }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            value="{{ $list->nama_barang }}">
                    </div>

                    <div class="mb-3">
                        <label for="hr_awal" class="form-label">Harga Awal</label>
                        <input type="number" class="form-control" id="hr_awal" name="hr_awal"
                            value="{{ $list->hr_awal }}">
                    </div>

                    <div class="mb-3">
                        <label for="hr_jual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="hr_jual" name="hr_jual"
                            value="{{ $list->hr_jual }}">
                    </div>

                    <div class="mb-3">
                        <label for="tgl_exp" class="form-label">Tanggal Expire</label>
                        <input type="date" class="form-control" id="tgl_exp" name="tgl_exp"
                            value="{{ $list->tgl_exp }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="satuan" class="form-label">Satuan</label>
                        <select name="satuan" class="form-select" id="satuan">
                            <option value="Lusin" {{ $list->satuan == 'Lusin' ? 'selected' : '' }}>Lusin</option>
                            <option value="Kodi" {{ $list->satuan == 'Kodi' ? 'selected' : '' }}>Kodi</option>
                            <option value="Karung" {{ $list->satuan == 'Karung' ? 'selected' : '' }}>Karung</option>
                            <option value="Pcs" {{ $list->satuan == 'Pcs' ? 'selected' : '' }}>Pcs</option>
                            <option value="Kg" {{ $list->satuan == 'Kg' ? 'selected' : '' }}>Kg</option>
                            <option value="Liter" {{ $list->satuan == 'Liter' ? 'selected' : '' }}>Liter</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" id="kategori">
                            <option value="Hasil Bumi" {{ $list->kategori == 'Hasil Bumi' ? 'selected' : '' }}>Hasil
                                Bumi</option>
                            <option value="Bahan Pangan" {{ $list->kategori == 'Bahan Pangan' ? 'selected' : '' }}>
                                Bahan Pangan</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" class="form-control" id="jumlah" name="jumlah" value="{{ $list->jumlah }}">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <form action="/hapus_barang/{{ $list->id_barang }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>

    </div>
</div>
</div>
