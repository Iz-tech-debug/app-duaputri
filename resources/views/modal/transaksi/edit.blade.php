{{-- modal --}}
<div class="modal fade" id="editkeranjang{{ $keranjang->id }}" tabindex="-1" aria-labelledby="editkeranjangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/hapus_keranjang/{{ $keranjang->id }}" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h5 class="modal-title" id="editkeranjangLabel">Hapus Barang di Keranjang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus <b>{{ $keranjang->barang->nama_barang }}</b> dari keranjang?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
