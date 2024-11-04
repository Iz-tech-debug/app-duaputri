<!-- Modal Detail Barang -->
<div class="modal modal-lg fade" id="lihatbarang{{ $list->id_barang }}" tabindex="-1" aria-labelledby="lihatbarangLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="lihatbarangLabel">Detail Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nama Barang : {{ $list->nama_barang }}</li>
                    <li class="list-group-item">Kategori : {{ $list->kategori->nama_kategori }}</li>
                    <li class="list-group-item">Satuan : {{ $list->units->nama_satuan }}</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
