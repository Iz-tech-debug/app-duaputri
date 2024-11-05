<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data barang dengan relasi ke units dan kategori
        $data['barang'] = Barang::with(['units', 'kategori'])->get();

        // Ambil semua data units(satuan) dan kategori untuk dropdown
        $data['units'] = Unit::all();
        $data['kategori'] = Category::all();

        return view('barang.barang', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tambah Barang
        $barang = new Barang;
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->hr_jual = $request->hr_jual;
        $barang->satuan_id = $request->satuan_id;
        $barang->kategori_id = $request->kategori_id;
        $barang->jumlah = 0;
        $barang->save();

        return redirect('/barang')->with('success', 'Barang Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_barang)
    {
        // Edit Barang
        $barang = Barang::where('id_barang', $id_barang)->firstOrFail();

        // Update field barang
        $barang->nama_barang = $request->nama_barang;
        $barang->hr_jual = $request->hr_jual;
        $barang->satuan_id = $request->satuan_id;
        $barang->kategori_id = $request->kategori_id;

        // Simpan perubahan
        $barang->save();

        return redirect('/barang')->with('success', 'Barang Berhasil Diubah.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang, $id_barang  )
    {
        // Hapus Barang
        $barang = Barang::where('id_barang', $id_barang)->firstOrFail();
        $barang->delete();

        return redirect('/barang')->with('success', 'Barang Berhasil Dihapus.');
    }
}
