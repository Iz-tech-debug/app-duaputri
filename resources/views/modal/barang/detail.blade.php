<!-- Modal Detail Barang -->
<div class="modal modal-lg fade" id="lihatbarang{{ $list->id_barang }}" tabindex="-1" aria-labelledby="lihatbarangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatbarangLabel">Detail Barang: {{ $list->nama_barang }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($list->detailBarang as $detail)
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>{{ $detail->barang->nama_barang }}</th>
                                </tr>
                            </thead>
                        </table>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
