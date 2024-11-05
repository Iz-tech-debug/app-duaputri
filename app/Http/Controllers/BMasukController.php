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
        

        return redirect('/supplierin')->with('success', 'Barang Masuk Berhasil Ditambahkan.');
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
