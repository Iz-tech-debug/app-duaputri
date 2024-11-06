<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //

    public function index()
    {
        // Mengambil data barang
        $data['barang'] = Barang::all();

        // Menghitung total penjualan sebagai jumlah transaksi
        $data['totalPenjualan'] = DB::table('transactions')->count();

        // Menghitung total pendapatan sebagai penjumlahan dari kolom `total_harga` di tabel transaksi
        $data['pendapatan'] = DB::table('transactions')->sum('total');

        // Menghitung total pendapatan sebagai penjumlahan dari kolom `total_harga` di tabel transaksi
        $data['hutang'] = DB::table('transactions')->sum('sisa');

        // Menghitung total pegawai dari tabel `users`
        $data['totalPegawai'] = DB::table('users')->count();

        $data['transaksi'] = DB::table('transactions')->get();

        return view('admin.index', $data);
    }


}
