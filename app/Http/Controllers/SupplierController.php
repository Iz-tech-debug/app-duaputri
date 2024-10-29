<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['suppliers'] = Supplier::all();

        return view('supplier.supplier', $data);
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
        // Tambah Pemasok
        $supplier = new Supplier;
        $supplier->nama_suplier = $request->nama_suplier;
        $supplier->alamat = $request->alamat;
        $supplier->no_telp = $request->no_telp;
        $supplier->nama_perusahaan = $request->nama_perusahaan;
        $supplier->save();
        alert()->success('Berhasil', 'Barang Berhasil Ditambahkan.');
        return redirect('/admin/supplier');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier, $id)
    {
        // Update Pemasok
        $supplier = Supplier::findOrFail(id: $id);
        $supplier->nama_suplier = $request->nama_suplier;
        $supplier->alamat = $request->alamat;
        $supplier->no_telp = $request->no_telp;
        $supplier->nama_perusahaan = $request->nama_perusahaan;
        $supplier->save();
        alert()->success('Berhasil', 'Data Pengguna Berhasil Diubah.');
        return redirect('/admin/supplier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
