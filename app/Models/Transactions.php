<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    public function detailTransaksi()
    {
        return $this->hasMany(DTransactions::class, 'transaksi_id');
    }
    
    protected $fillable = [
        'id',
        'user_id',
        'nama_konsumen',
        'tanggal_transaksi',
        'total',
        'bayar',
        'kembalian',
        'sisa',
    ];
}
