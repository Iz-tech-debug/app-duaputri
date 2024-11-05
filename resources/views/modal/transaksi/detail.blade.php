<!-- Modal Detail Transaksi -->
<div class="modal fade" id="detailtrans{{ $list->id }}" tabindex="-1" aria-labelledby="detailtransLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailTransaksiModalLabel">Detail Transaksi - {{ $list->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Nama Konsumen</th>
                        <td>{{ $list->nama_konsumen }}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>{{ 'Rp ' . number_format($list->total, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Bayar</th>
                        <td>{{ 'Rp ' . number_format($list->bayar, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Kembalian</th>
                        <td>{{ 'Rp ' . number_format($list->kembalian, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Sisa</th>
                        <td>{{ $list->sisa == 0 ? 'Lunas' : 'Hutang' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <td>{{ $list->tanggal_transaksi }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
