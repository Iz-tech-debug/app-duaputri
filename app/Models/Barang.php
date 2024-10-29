<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function barangMasuk()
    {
        return $this->hasMany(BMasuk::class);
    }


    protected $table = 'barang';

    protected $primaryKey = 'id_barang';
    // protected $fillable = 'barang';
}
