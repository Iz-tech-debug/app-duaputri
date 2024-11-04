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
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            value="{{ $list->nama_barang }}">
                    </div>

                    <div class="col mb-3">
                        <label for="hr_jual" class="col-sm-4 col-form-label">Harga Jual</label>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="text" class="form-control" id="hr_jual" name="hr_jual"
                                    value="{{ number_format($list->hr_jual, 0, ',', '.') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="satuan_id" class="form-label">Satuan</label>
                        <select name="satuan_id" class="form-select" id="satuan_id">
                            @foreach ($units as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_satuan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select" id="kategori_id">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
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

<script>
    // Fungsi untuk memformat angka ke dalam format Rupiah
    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
</script>
