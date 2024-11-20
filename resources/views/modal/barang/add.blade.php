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
                        <label for="hr_jual" class="form-label">Harga Jual</label>
                        <input type="text" type="number" class="form-control" id="hr_jual" name="hr_jual"
                            placeholder="Contoh : 12500" min="1">
                    </div>

                    <script>
                        document.getElementById("hr_jual").addEventListener("keyup", function() {
                            value = this.value;
                            // console.log(value);

                            if (value < 0) {
                                this.value = 0;
                            }
                        });
                    </script>
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

                    <div class="mb-3" hidden>
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="0">
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
