<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'nama_kategori',
    ];

    // Relasi ke tabel `barang`
    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id'); // foreign key 'kategori_id' di tabel barang
    }
}
