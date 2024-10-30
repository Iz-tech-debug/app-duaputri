<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    protected $fillable = [
        'nama_satuan',
    ];


    // Relasi dengan tabel barang
    public function barang()
    {
        return $this->hasMany(Barang::class, 'id'); // Pastikan satuan_id adalah foreign key di tabel barang
    }
}
