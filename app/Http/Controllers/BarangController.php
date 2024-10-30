<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Unit;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barang'] = Barang::with('units','categories')->get();
        return view('barang.barang', $data);
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
        // Tambah Barang
        $barang = new Barang;
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->hr_awal = $request->hr_awal;
        $barang->hr_jual = $request->hr_jual;
        $barang->tgl_exp = $request->tgl_exp;
        $barang->satuan = $request->satuan;
        $barang->kategori = $request->kategori;
        $barang->no_order = $request->no_order;
        $barang->jumlah = 0;
        $barang->save();
        alert()->success('Berhasil', 'Barang Berhasil Ditambahkan.');
        return redirect('/admin/barang');
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
        // Edit Barang, pastikan menggunakan id_barang sebagai kolom yang dicari
        $barang = Barang::where('id_barang', $id_barang)->firstOrFail();

        // Update field barang
        $barang->id_barang = $request->id_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->hr_awal = $request->hr_awal;
        $barang->hr_jual = $request->hr_jual;
        $barang->tgl_exp = $request->tgl_exp;
        $barang->satuan = $request->satuan;
        $barang->kategori = $request->kategori;
        $barang->jumlah = $request->jumlah;

        // Simpan perubahan
        $barang->save();

        // Notifikasi sukses
        alert()->success('Berhasil', 'Barang Berhasil di Edit.');

        return redirect('/admin/barang');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
