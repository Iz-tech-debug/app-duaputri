<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBMasuk extends Model
{
    use HasFactory;

    protected $table = 't_b_masuks'; // Sesuaikan nama tabel jika diperlukan

    // Relasi ke tabel supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
