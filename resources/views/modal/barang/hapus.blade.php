<!-- Modal -->
<div class="modal fade" id="hapusbarang{{ $list->id_barang }}" tabindex="-1" aria-labelledby="hapusbarang"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/hapus_barang/{{ $list->id_barang }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus barang ini <b>{{ $list->nama_barang }}</b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>
