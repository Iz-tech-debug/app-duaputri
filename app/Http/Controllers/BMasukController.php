<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BMasuk;
use App\Models\TBMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data barang masuk dengan relasi ke supplier dan barang
        $barangMasuk = BMasuk::with(['supplier', 'barang'])->get();

        // Ambil semua data barang masuk dengan relasi ke supplier
        $TBMasuk = TBMasuk::with('supplier')->get();

        // Ambil semua data suppliers
        $suppliers = Supplier::all();

        // Ambil semua data barang
        $barang = Barang::all();

        

        // Kirim data barang masuk dan suppliers ke view
        return view('supplier.supplierin', compact('barangMasuk', 'suppliers', 'barang', 'TBMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'barang_id.*' => 'required',
            'id_trans' => 'required', // Hanya perlu satu kali, bukan array
            'supplier_id' => 'required', // Hanya perlu satu kali, bukan array
            'harga_satuan.*' => 'required|numeric',
            'jumlah.*' => 'required|numeric',
            'tanggal_masuk.*' => 'required|date',
        ]);

        // Simpan data transaksi utama ke tabel `t_b_masuks`
        $transaksiMasuk = new TBMasuk();
        $transaksiMasuk->id_tmasuk = $request->id_trans;
        $transaksiMasuk->supplier_id = $request->supplier_id;
        $transaksiMasuk->tgl_bmasuk = now(); // Atau bisa menggunakan $request->tanggal_masuk[0] jika tanggal masuk sama untuk semua
        $transaksiMasuk->save();

        // Loop untuk menyimpan setiap barang ke `b_masuks`
        foreach ($request->barang_id as $key => $barang_id) {
            $masuk = new BMasuk();
            $masuk->id_trans = $transaksiMasuk->id;
            $masuk->supplier_id = $request->supplier_id;
            $masuk->barang_id = $barang_id;
            $masuk->harga_satuan = $request->harga_satuan[$key];
            $masuk->jumlah = $request->jumlah[$key];
            $masuk->total_harga = $request->harga_satuan[$key] * $request->jumlah[$key];
            $masuk->tgl_masuk = $request->tanggal_masuk[$key];
            $masuk->save();

            // Update jumlah stok di tabel barang
            $barang = Barang::find($barang_id);
            if ($barang) {
                $barang->jumlah += $request->jumlah[$key];
                $barang->save();
            }
        }

        return redirect('/supplierin');
    }


    /**
     * Display the specified resource.
     */
    public function show(BMasuk $bMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BMasuk $bMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BMasuk $bMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BMasuk $bMasuk)
    {
        //
    }
}
