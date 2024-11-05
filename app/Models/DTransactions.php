<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTransactions extends Model
{
    use HasFactory;

    // Relasi ke tabel barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
