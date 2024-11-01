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
        $suppliers = Supplier::all(); // Ambil semua data supplier

        // Ambil semua data barang
        $barang = Barang::all(); // Ambil semua data barang

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'barang_id' => 'required|exists:barang,id_barang',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|integer',
        ]);

        // Hitung total harga
        $totalHarga = $request->jumlah * $request->harga_satuan;

        // Simpan barang masuk
        $barangMasuk = new BMasuk();
        $barangMasuk->supplier_id = $request->supplier_id;
        $barangMasuk->barang_id = $request->barang_id;
        $barangMasuk->jumlah = $request->jumlah;
        $barangMasuk->harga_satuan = $request->harga_satuan;
        $barangMasuk->total_harga = $totalHarga;
        $barangMasuk->tanggal_masuk = now();
        $barangMasuk->save();

        return redirect()->route('barangMasuk.index')->with('success', 'Barang berhasil ditambahkan');
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
