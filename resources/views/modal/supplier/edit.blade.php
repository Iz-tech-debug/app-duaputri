<!-- Modal -->
<div class="modal fade" id="editsupplier{{ $list->id }}" tabindex="-1" aria-labelledby="editsupplier"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/update_supplier/{{ $list->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pemasok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pemasok</label>
                        <input type="text" class="form-control" id="nama" name="nama_suplier" value="{{ $list->nama_suplier }}">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            placeholder="Contoh : Bandung" value="{{ $list->alamat }}">
                    </div>

                    <div class="mb-3">
                        <label for="notelepon" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="notelepon" name="no_telp"
                            placeholder="Contoh : 08123456789" value="{{ $list->no_telp }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pemasok</label>
                        <input type="text" class="form-control" id="nama" name="nama_perusahaan" value="{{ $list->nama_perusahaan }}">
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
