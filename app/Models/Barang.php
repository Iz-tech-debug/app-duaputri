<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';

    protected $primaryKey = 'id_barang';
    
    public function barangMasuk()
    {
        return $this->hasMany(BMasuk::class);
    }
    public function units()
    {
        return $this->belongsTo(Unit::class, 'satuan_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}
