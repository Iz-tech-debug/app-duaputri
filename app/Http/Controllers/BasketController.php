<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Basket;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data barang
        $data['barang'] = Barang::all();

        // Mengambil keranjang berdasarkan user yang sedang login
        $userId = Auth::id(); // Dapatkan ID user yang sedang login

        // Ambil data keranjang untuk user yang login
        $data['baskets'] = Basket::where('user_id', $userId)->get();

        // Hitung total dari kolom subtotal di keranjang
        $total = $data['baskets']->sum('subtotal');
        $data['total'] = number_format($total, 0, ',', '.'); // Formatkan menjadi Rupiah

        // Kode Otomatis
        $data['kodeOtomatis'] = $this->kodeotomatis();

        return view('transaksi.mtrans', $data);
    }


    public function kodeotomatis()
    {
        $query = Transactions::selectRaw('MAX(RIGHT(id, 7)) AS max_number');
        $kode = "0000001";
        if ($query->count() > 0) {
            $data = $query->first();
            $number = ((int) $data->max_number) + 1;
            $kode = sprintf("%03s", $number);
        }
        return "KDTRS" . $kode;
    }

    // Masukkan ke keranjang
    public function mkeranjang(Request $request)
    {
        // Ambil barang dari database berdasarkan id_barang
        $barang = Barang::where('id_barang', $request->barang_id)->first();

        // Cek apakah stok cukup
        if ($barang->jumlah >= $request->qty) {

            // Cek apakah barang sudah ada di keranjang
            $keranjang = Basket::where('user_id', $request->user_id)
                ->where('barang_id', $request->barang_id)
                ->first();

            if ($keranjang) {
                // Jika barang sudah ada, update qty dan subtotal
                $keranjang->qty += $request->qty;
                $keranjang->subtotal = $keranjang->qty * $request->hr_jual;
                $keranjang->save();
            } else {
                // Jika barang belum ada, tambahkan barang baru ke keranjang
                $keranjang = new Basket();
                $keranjang->user_id = $request->user_id;
                $keranjang->barang_id = $request->barang_id;
                $keranjang->hr_jual = $request->hr_jual;
                $keranjang->qty = $request->qty;
                $keranjang->subtotal = $request->hr_jual * $request->qty;
                $keranjang->save();
            }

            // Kurangi stok barang
            $barang->jumlah -= $request->qty;
            $barang->save();

            // Berikan notifikasi berhasil
            alert()->success('Berhasil', 'Barang berhasil ditambahkan ke keranjang.');
        } else {
            // Jika stok tidak cukup, beri notifikasi error
            alert()->error('Gagal', 'Stok barang tidak mencukupi.');
        }

        return redirect('/admin/transaksi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Basket $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Basket $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Basket $keranjang, string $id)
    {
        // Ambil data keranjang berdasarkan ID
        $keranjang = Basket::find($id);
        $keranjang->barang_id = $request->barang_id;
        $keranjang->qty = $request->qty;

        // Ambil data barang berdasarkan barang_id dari keranjang
        $barang = Barang::where('id_barang', $keranjang->barang_id)->first();

        // Hitung selisih antara qty baru dengan qty sebelumnya
        $qty_sebelumnya = $keranjang->qty;
        $qty_baru = $request->qty;

        // Validasi apakah stok cukup jika qty baru lebih besar dari sebelumnya
        if ($qty_baru > $qty_sebelumnya) {
            // Stok yang perlu dikurangi
            $selisih = $qty_baru - $qty_sebelumnya;

            // Cek apakah stok cukup
            if ($barang->jumlah >= $selisih) {
                // Kurangi stok barang
                $barang->jumlah -= $selisih;
            } else {
                // Jika stok tidak cukup, beri notifikasi error
                alert()->error('Gagal', 'Stok barang tidak mencukupi.');
                return redirect('/admin/transaksi');
            }
        } else {
            // Jika qty baru lebih kecil, tambahkan stok kembali
            $selisih = $qty_sebelumnya - $qty_baru;
            $barang->jumlah += $selisih;
        }

        // Simpan perubahan stok barang
        $barang->save();

        // Update data keranjang
        $keranjang->qty = $qty_baru;
        $keranjang->subtotal = $qty_baru * $keranjang->hr_jual;
        $keranjang->save();

        return redirect('/admin/transaksi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Basket $keranjang, $id)
    {
        $keranjang = Basket::findOrFail($id);

        // Ambil data barang dari keranjang
        $barangId = $keranjang->barang_id;
        $jumlahDihapus = $keranjang->qty;

        // Tambahkan kembali jumlah ke stok barang
        $barang = Barang::findOrFail($barangId);
        $barang->stok += $jumlahDihapus;
        $barang->save();

        // Hapus keranjang
        $keranjang->delete();

        return redirect("/admin/transaksi");
    }

}
