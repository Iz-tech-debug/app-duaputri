<!-- resources/views/transaksi/struk.blade.php -->
<h2>Struk Transaksi</h2>
<p>No. Transaksi: {{ $transaksi->notrans }}</p>
<p>Nama Konsumen: {{ $transaksi->konsumen }}</p>
<p>Tanggal: {{ $transaksi->created_at->format('d-m-Y H:i') }}</p>

<table>
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi->detailTransaksi as $item)
            <tr>
                <td>{{ $item->barang->nama_barang ?? 'Barang tidak ditemukan' }}</td>
                <td>{{ $item->qty }}</td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p>Total: Rp {{ number_format($transaksi->total, 0, ',', '.') }}</p>
