<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'material_code',
        'nama_barang',
        'stock_awal',
        'unit',
        'min',
        'max',
    ];

    protected $casts = [
        'stock_awal' => 'decimal:2',
        'min' => 'decimal:2',
        'max' => 'decimal:2',
    ];

    public function barangMasuk(): HasMany
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluar(): HasMany
    {
        return $this->hasMany(BarangKeluar::class);
    }
}