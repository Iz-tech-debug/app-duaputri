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
        return $this->hasMany(Barang::class, 'satuan_id'); // foreign key 'satuan_id' di tabel barang
    }
}
