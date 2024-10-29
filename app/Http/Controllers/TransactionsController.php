<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Support\Str;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\DTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
            'konsumen' => 'required|string|max:255',
            'total' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
            'sisa' => 'required|numeric',
        ]);

        // Buat transaksi baru
        $transaksi = new Transactions();
        $transaksi->id = Str::uuid();
        $transaksi->user_id = Auth::id(); // Mengambil ID user yang login
        $transaksi->nama_konsumen = $request->konsumen; // Mengambil nama konsumen dari form
        $transaksi->tanggal_transaksi = now(); // Mengambil tanggal saat ini
        $transaksi->total = $request->total;
        $transaksi->bayar = $request->bayar;
        $transaksi->kembalian = $request->kembalian;
        $transaksi->sisa = $request->sisa;
        $transaksi->save();

        // Looping keranjang dan masukkan ke detail transaksi
        foreach (Basket::where('user_id', Auth::id())->get() as $keranjang) {
            $detailTransaksi = new DTransactions();
            $detailTransaksi->transaksi_id = $transaksi->id;
            $detailTransaksi->barang_id = $keranjang->barang_id;
            $detailTransaksi->harga = $keranjang->hr_jual;
            $detailTransaksi->qty = $keranjang->qty;
            $detailTransaksi->subtotal = $keranjang->subtotal;
            $detailTransaksi->save();
        }

        // Setelah transaksi berhasil, kosongkan keranjang user
        Basket::where('user_id', Auth::id())->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions)
    {
        //
    }
}
