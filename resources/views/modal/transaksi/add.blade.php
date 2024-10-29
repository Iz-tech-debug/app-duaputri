<!-- Modal -->
<div class="modal fade" id="tambahkeranjang{{ $list->id_barang }}" tabindex="-1" aria-labelledby="tambahkeranjang"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/tambah_keranjang" method="POST">
                @csrf
                {{-- Input hidden untuk barang_id --}}
                <input type="hidden" name="barang_id" value="{{ $list->id_barang }}">
                <!-- Input hidden untuk user_id -->
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah anda ingin tambah
                        <b>{{ $list->nama_barang }}</b> ke Keranjang?
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3" hidden>
                        <label for="hr_jual" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="hr_jual" name="hr_jual"
                            value="{{ $list->hr_jual }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="qty" class="form-label">Kuantitas</label>
                        <input type="text" class="form-control" id="qty" name="qty"
                            placeholder="Contoh : 3">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Masukan</button>
                </div>
            </form>
        </div>
    </div>
</div>


